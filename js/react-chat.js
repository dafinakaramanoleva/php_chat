// This is the chat row component
var Row = React.createClass({
  render: function() {
    return (
      <div className="row msg">
        <div className="col-md-2 username">{this.props.username}</div>
        <div className="col-md-7 msg-text">{this.props.message}</div>
        <div className="col-md-2 time">{this.props.time}</div>
      </div>
    );
  }
});


/**
 * Messages component
 */`
var Messages = React.createClass({
  render: function() {
    // This is how you set inline styles in React
    var inlineStyles = {
      height: '500px',
      overflowY: 'scroll'
    };
  
    // Loop through the list of chats and create array of Row components
    var Rows = this.props.datas.map(function(data) {
      return (
        <Row username={data.username} time={data.time} message={data.message} />
      )
    });
    
    return (
      <div style={inlineStyles}>
        {Rows}
      </div>
    );
  }
});


var ChatContainer = React.createClass({
  // Load the initial chats
  getInitialState: function() {
    return {datas: []};
  },
  
  // Get's the list of messages from the server and set's the state,
  // so that it re-renders the Messages
  getMessages: function() {
    $.ajax({
      url: 'ajax/updateChat.php',
      dataType: 'json',
      success: function(data) {
        this.setState({datas: data});
      }.bind(this)
    });
  },
  
  // Will add a new message and update the messages list
  sendMessage: function(message) {
    var that = this;
    $.ajax({
      url: 'ajax/insert_msg.php',
      method: 'post',
      dataType: 'json',
      data: {msg: message},
      success: function(data) {
        this.setState({datas: data});
      }.bind(this)
    });
  },
  
  componentDidMount: function() {
    // get the list of messages
    this.getMessages();
    // set the poll interval
    setInterval(this.getMessages, 5000);
  },
  
  render: function() {
    return (
        // <ChatHeader />
        <Messages datas={this.state.datas} />

    );
  }
});

// React entry point
React.render(
  <ChatContainer />,
  document.getElementById('app')
);