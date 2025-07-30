import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { AuthProvider } from './contexts/AuthContext';
import Layout from './components/Layout/Layout';
import Home from './pages/Home';
import Login from './pages/Login';
import Register from './pages/Register';
import TeaApp from './pages/TeaApp';
import Beneficiarios from './pages/Beneficiarios';
import CadastrarBeneficiario from './pages/CadastrarBeneficiario';
import MeuBeneficiario from './pages/MeuBeneficiario';
import Profissionais from './pages/Profissionais';
import ProfissionalLogin from './pages/ProfissionalLogin';
import ProfissionalPerfil from './pages/ProfissionalPerfil';
import Welcome from './pages/Welcome';
import './App.css';

function App() {
  return (
    <AuthProvider>
      <Router>
        <Routes>
          {/* Public Routes */}
          <Route path="/" element={<Welcome />} />
          <Route path="/login" element={<Login />} />
          <Route path="/cadastro" element={<Register />} />
          <Route path="/servicos" element={<div>Serviços</div>} />
          <Route path="/sou-profissional" element={<div>Sou Profissional</div>} />
          <Route path="/profissional/loginProfissionais" element={<ProfissionalLogin />} />
          <Route path="/profisisonais" element={<Profissionais />} />
          
          {/* Protected Routes */}
          <Route path="/home" element={<Layout><Home /></Layout>} />
          <Route path="/tea-app" element={<Layout><TeaApp /></Layout>} />
          <Route path="/tea-app/meus-meneficiarios" element={<Layout><Beneficiarios /></Layout>} />
          <Route path="/tea-app/cadastrar-beneficiario" element={<Layout><CadastrarBeneficiario /></Layout>} />
          <Route path="/tea-app/meu-beneficiario/:id" element={<Layout><MeuBeneficiario /></Layout>} />
          <Route path="/teaPro-app" element={<Layout><div>Tea Pro App</div></Layout>} />
          <Route path="/Perfil-profissional/:id" element={<Layout><ProfissionalPerfil /></Layout>} />
        </Routes>
      </Router>
    </AuthProvider>
  );
}

export default App;