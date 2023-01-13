import './assets/css/reset.css';
import './assets/css/texts.css';
import './assets/css/buttons.css';
import './assets/css/box.css';
import './assets/css/page-login-register.css';
import Login from './pages/Login/Login';
import Register from './pages/Register/Register';
import Home from './pages/Home/Home';
import Coloc from "./components/coloc/Coloc"
import NameColoc from './pages/NameColoc/NameColoc';

function App() {
  return (
    <div className="App">
      <NameColoc />
    </div>
  );
}

export default App;