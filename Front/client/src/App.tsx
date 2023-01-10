import './App.css';
import Register from './components/Register/Register';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Dashboard from './Pages/Dashboard';
import NeedAuth from './components/Routes/NeedAuth';

function App() {
  return (
    <div className="min-vh-100 gradient-custom">
            <BrowserRouter>
                <Routes>
                <Route path={"/register"} element={<Register/>}/>
                <Route path={'/'} element={
                        <NeedAuth>
                            <Dashboard/>
                        </NeedAuth>
                    }/>
                </Routes>
            </BrowserRouter>
    </div>
  );
}

export default App;
