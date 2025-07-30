import { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';
import Header from '../components/Layout/Header';
import Footer from '../components/Layout/Footer';
import Button from '../components/UI/Button';
import Input from '../components/UI/Input';

const ProfissionalLogin = () => {
  const [formData, setFormData] = useState({
    email: '',
    password: ''
  });
  const [errors, setErrors] = useState({});
  const [loading, setLoading] = useState(false);
  
  const { login } = useAuth();
  const navigate = useNavigate();

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: value
    }));
    if (errors[name]) {
      setErrors(prev => ({
        ...prev,
        [name]: ''
      }));
    }
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setErrors({});

    // For professional login, you might want to use a different endpoint
    const result = await login({ ...formData, type: 'professional' });
    
    if (result.success) {
      navigate('/teaPro-app');
    } else {
      setErrors({ general: result.error });
    }
    
    setLoading(false);
  };

  return (
    <div className="min-h-screen bg-gray-200">
      <Header />
      
      <div className="flex items-center justify-center min-h-screen py-12">
        <div className="bg-white rounded-2xl shadow-xl overflow-hidden max-w-6xl w-full mx-4">
          <div className="flex flex-col lg:flex-row">
            {/* Left Side - Login Form */}
            <div className="lg:w-1/2 p-12">
              <div className="max-w-md mx-auto">
                <h1 className="text-4xl font-semibold text-gray-900 mb-8">Fazer Login</h1>
                
                {/* Login Form */}
                <form onSubmit={handleSubmit} className="space-y-6">
                  {errors.general && (
                    <div className="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
                      {errors.general}
                    </div>
                  )}
                  
                  <Input
                    label="Email:"
                    type="email"
                    name="email"
                    value={formData.email}
                    onChange={handleChange}
                    placeholder="Digite seu email"
                    error={errors.email}
                    required
                  />
                  
                  <Input
                    label="Senha:"
                    type="password"
                    name="password"
                    value={formData.password}
                    onChange={handleChange}
                    placeholder="Digite sua senha"
                    error={errors.password}
                    required
                  />
                  
                  <div className="text-right">
                    <Link 
                      to="/forgot-password" 
                      className="text-blue-600 hover:text-blue-800 font-medium"
                    >
                      Esqueceu a senha?
                    </Link>
                  </div>
                  
                  <Button 
                    type="submit" 
                    className="w-full py-3"
                    loading={loading}
                  >
                    Login
                  </Button>
                  
                  <p className="text-center text-gray-600">
                    Ainda não tem uma conta?{' '}
                    <Link 
                      to="/cadastro" 
                      className="text-blue-600 hover:text-blue-800 font-medium"
                    >
                      Cadastre-se
                    </Link>
                  </p>
                </form>
              </div>
            </div>
            
            {/* Right Side - Professional Background */}
            <div 
              className="lg:w-1/2 bg-cover bg-center bg-no-repeat flex items-center justify-center"
              style={{
                backgroundImage: 'url(/images/Background-profissional-login.jpg)'
              }}
            >
              <div className="bg-black bg-opacity-50 p-8 rounded-lg text-white text-center max-w-md">
                <h3 className="text-2xl font-bold mb-4">Portal Profissional</h3>
                <p className="text-lg">
                  Acesse sua área profissional e gerencie seus atendimentos de forma eficiente.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <Footer />
    </div>
  );
};

export default ProfissionalLogin;