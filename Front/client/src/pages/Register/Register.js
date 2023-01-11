import axios from 'axios';
import React, { useRef, useState } from 'react'
import { useNavigate } from 'react-router-dom';

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
    <div>
    <section className='vh-100'>
        <div className='container-fluid h-custom' >
            <div className='row d-flex justify-content-center align-items-center h-100'>
                <div className="col-md-9 col-lg-6 col-xl-5" >
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    className="img-fluid" alt="Sample image"/>
                </div>
                <div className="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>
                        <div className="form-outline mb-4">
                            <input type="text" id="form3Example3" className="form-control form-control-lg" placeholder="e-mail" ref={emailRef} />
                            <label className="form-label" >E-mail</label>
                        </div>
                        <div className="form-outline mb-4">
                            <input type="text" id="form3Example3" className="form-control form-control-lg" placeholder="username" ref={usernameRef}/>
                            <label className="form-label" >username</label>
                        </div>
                        
                        <div className="form-outline mb-4">
                            <input type="password" id="form3Example3" className="form-control form-control-lg" placeholder="password" ref={passwordRef}   />
                            <label className="form-label" >Password</label>
                        </div>
                        <div className="form-outline mb-4">
                            <input type="password" id="form3Example3" className="form-control form-control-lg" placeholder="confirmPassword" ref={confirm_passwordRef}  />
                            <label className="form-label">confirmPassword</label>
                        </div>
                        <button type='submit' className="btn btn-primary btn-lg" onClick={handleFinish}>Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
  )
}

export default Register