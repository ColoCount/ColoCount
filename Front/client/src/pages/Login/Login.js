import React, { useContext, useState } from 'react'
import { Link, useNavigate } from 'react-router-dom';
import { login } from '../../AuthContext/apiCalls';
import { AuthContext } from '../../AuthContext/AuthContext';

const Login = () => {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [token, setToken] = useState(null);

  const handleSubmit = async (event) => {
    event.preventDefault();
    const response = await fetch("http://localhost:1501/login", {
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      credentials: 'include',
      body: `username=${username}&password=${password}`
    });
    const data = await response.json();
    if(data.token){
        setToken(data.token);
        localStorage.setItem("token", data.token);
        setUsername("");
        setPassword("");
    }
  };

  const handleLogout = () => {
    setToken(null);
    localStorage.removeItem("token");
  };

  return (
    
    <div className='vh-100 page page-login page-log-reg flex-center'>
     {token ? (
        <>
          <p>You are logged in.</p>
          <button onClick={handleLogout}>Logout</button>
        </>
      ) : (
        <div className='login-container' >
            <h2 className="title-regular text-center">Bienvenue sur <br/><span>ColoCount</span></h2>
            <div className="box-shadow-1 box-model">
                <h1 className="text-center">Se connecter</h1>
                <form onSubmit={handleSubmit}>
                    <div className="fields-column">
                        <div className="fields-row mb-4">
                            <input id="form3Example3" className="form-control form-control-lg" placeholder="Adresse email"  name="username"  type="text"
              value={username}
              onChange={(e) => setUsername(e.target.value)} />
                        </div>
                        <div className="fields-row mb-4">
                            <input id="form3Example3" className="form-control form-control-lg" placeholder="Mot de passe"  name="password"  type="password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}/>
                        </div>
                    </div>
                    <div className="bloc-btn">
                    {/* {err && err} */}
                        <button type="submit" >Je me connecte</button>
                    </div>
                </form>
            </div>
        </div>
        )}
    </div>

  )
}

export default Login