import React from 'react';
//import LoginPage from './pages/LoginPage/Login';
// import LoginPage from './pages/RedirectionPage/Redirection';

function App() {
  const path = window.location.pathname;
    switch (path) {
      case '/login':
        return <Login />;
//      case '/redirection':
//        return <Redirection />;
      default:
        return <div>Page not found</div>;
    }
}

export default App;
