import React, { useContext, useState } from 'react'
import { Link } from 'react-router-dom';
import { login } from '../../AuthContext/apiCalls';
import { AuthContext } from '../../AuthContext/AuthContext';

const Login = () => {
    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");
    const { dispatch } = useContext(AuthContext);

    const handleLogin = (e) => {
        e.preventDefault();
        login({ username, password }, dispatch);
    }
  

  return (
    <div className='vh-100 page page-login page-log-reg flex-center'>
        <div className='login-container' >
            <h2 className="title-regular text-center">Bienvenue sur <br/><span>ColoCount</span></h2>
            <div className="box-shadow-1 box-model">
                <h1 className="text-center">Se connecter</h1>
                <form>
                    <div className="fields-column">
                        <div className="fields-row mb-4">
                            <input id="form3Example3" className="form-control form-control-lg" placeholder="Adresse email"  type="text"  onChange={(e) => setUsername(e.target.value)} />
                        </div>
                        <div className="fields-row mb-4">
                            <input id="form3Example3" className="form-control form-control-lg" placeholder="Mot de passe" type="password"  onChange={(e) => setPassword(e.target.value)}/>
                        </div>
                    </div>
                    <div className="bloc-btn">
                        <button type="submit" onClick={handleLogin} >Je me connecte</button>
                    </div>
                </form>
            </div>
            {/* <p className="para-16 medium text-center">Tu n’as pas encore de compte ? <Link to="/register" className="link" >Je m'inscris</Link></p> */}
        </div>
    </div>

  )
}

export default Login