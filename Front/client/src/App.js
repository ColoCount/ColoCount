import './assets/css/reset.css';
import './assets/css/texts.css';
import './assets/css/buttons.css';
import './assets/css/box.css';
import './assets/css/page-home.css';
import './assets/css/page-depenses.css';
import './assets/css/page-login-register.css';
import './assets/css/mes-colocs-modale.css';
import Login from './pages/Login/Login';
import Register from './pages/Register/Register';
import AddColoc from './pages/mesColocs/AddColoc';
import Home from './pages/Home/Home';
import Coloc from "./components/coloc/Coloc"
import NameColoc from './pages/NameColoc/NameColoc';
import React from "react";
import NavBar from './components/navBar/NavBar';
import ReactDOM from 'react-dom/client';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import NavBarToggle from "./components/navBar/NavBarToggle";

function App() {
  return (
      <BrowserRouter>
          <div className="App">
                <NavBarToggle />
          </div>
          <Routes>
              <Route path='/' element={<Home />} />
              <Route path='/mesColocs' element={<Coloc />} />
              <Route path='/NameColoc' element={<NameColoc />} />
              <Route path='/AddColoc' element={<AddColoc />} />
              <Route path='/login' element={<Login />} />

          </Routes>
      </BrowserRouter>
  );
}

export default App;
