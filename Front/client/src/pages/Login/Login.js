import React, { useContext, useState } from 'react'
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
    <div>
    <section className='vh-100'>
        <div className='container-fluid h-custom' >
            <div className='row d-flex justify-content-center align-items-center h-100'>
                <div className="col-md-9 col-lg-6 col-xl-5" >
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" className="img-fluid"/>
                </div>
                <div className="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>
                        <div className="form-outline mb-4">
                            <input id="form3Example3" className="form-control form-control-lg" placeholder="username"  type="text"  onChange={(e) => setUsername(e.target.value)} />
                            <label className="form-label">username</label>
                        </div>
                        <div className="form-outline mb-4">
                            <input id="form3Example3" className="form-control form-control-lg" placeholder="password" type="password"  onChange={(e) => setPassword(e.target.value)}/>
                            <label className="form-label">Password</label>
                        </div>
                        <button type="submit" className="btn btn-primary btn-lg" onClick={handleLogin} >Login</button>
                        {/* <p className="small fw-bold mt-2 pt-1 mb-0">Don't have an account?</p><Link to={"/register"}></Link> */}
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
  )
}

export default Login