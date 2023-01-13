import './assets/css/reset.css';
import './assets/css/texts.css';
import './assets/css/buttons.css';
import './assets/css/box.css';
import './assets/css/page-login-register.css';
import './assets/css/mes-colocs-modale.css';
import Login from './pages/Login/Login';
import Register from './pages/Register/Register';
import AddColoc from './pages/mesColocs/AddColoc';

function App() {
  return (
    <div className="App">
      <AddColoc/>
    </div>
  );
}

export default App;
