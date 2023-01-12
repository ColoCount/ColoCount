import axios from 'axios';
import React, { useRef, useState } from 'react'
import { useNavigate } from 'react-router-dom';
import { Button } from '../../components/Button/Button';


const Register = () => {
    const [email, setEmail] = useState("");
    const [confirm_password, setconfirm_password] = useState("");
    const [password, setPassword] = useState("");
    const [username, setUsername] = useState("");

    const emailRef = useRef();
    const passwordRef = useRef();
    const confirm_passwordRef = useRef();
    const usernameRef = useRef();

    const handleStart = () => {
        setEmail(emailRef.current.value);
        };

        const handleFinish = async (e) => {
            e.preventDefault();
            setPassword(passwordRef.current.value);
            setconfirm_password(confirm_passwordRef.current.value);
            setUsername(usernameRef.current.value);
            try {
                await fetch("http://localhost:1501/register", {
                  method: "POST",
                  body: JSON.stringify({ email,username, password, confirm_password}),
                  credentials: "include",
                  headers: new Headers({
                    "Authorization": "Basic amZnbWFpbC5jb206cGFzc3dvcmQ=",
                    "Content-type": "application/x-www-form-urlencoded"
                })
                });
              } catch (err) {
                console.error(err);
              }
        };

  return (
      <div className='vh-100 page page-register page-log-reg flex-center'>
          <div className='register-container'>
              <h2 className="title-regular text-center">Bienvenue sur <br/><span>ColoCount</span></h2>
              <div className="box-shadow-1 box-model">
                  <h1 className="text-center">S'inscrire</h1>
                  <form>
                      <div className="fields-column">
                          <div className="fields-row mb-4">
                              <input type="text" id="form3Example3" className="form-control form-control-lg" placeholder="Pseudo" ref={usernameRef}/>
                              <input type="email" id="form3Example3" className="form-control form-control-lg" placeholder="Adresse email" ref={emailRef} />
                          </div>
                          <div className="fields-row mb-4">
                              <input type="password" id="form3Example3" className="form-control form-control-lg" placeholder="Mot de passe" ref={passwordRef}   />
                              <input type="password" id="form3Example3" className="form-control form-control-lg" placeholder="Confirmation mot de passe" ref={confirm_passwordRef}  />
                          </div>
                      </div>
                      <div className="bloc-btn">
                          <button type="submit" className="btn btn-primary btn-lg" onClick={handleFinish} >Je m'inscris</button>
                      </div>
                      {/* <p className="small fw-bold mt-2 pt-1 mb-0">Don't have an account?</p><Link to={"/register"}></Link> */}
                  </form>
              </div>
              <p className="para-16 medium text-center">Tu as déjà un compte ? <a className="link" href="#">Je me connecte</a></p>
          </div>
      </div>
 
  )
}

export default Register