import { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';
import Header from '../components/Layout/Header';
import Footer from '../components/Layout/Footer';
import Button from '../components/UI/Button';
import Input from '../components/UI/Input';

const Login = () => {
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
    // Clear error when user starts typing
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

    const result = await login(formData);
    
    if (result.success) {
      navigate('/home');
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
                
                {/* Google Login Button */}
                <Button 
                  variant="outline" 
                  className="w-full mb-6 py-3 border-gray-300 hover:bg-gray-50"
                >
                  <img src="/images/google logo.svg" alt="Google" className="w-5 h-5 mr-3" />
                  Entrar com Google
                </Button>
                
                {/* Divider */}
                <div className="flex items-center mb-6">
                  <div className="flex-1 h-px bg-gray-300"></div>
                  <span className="px-4 text-gray-500 font-medium">OU</span>
                  <div className="flex-1 h-px bg-gray-300"></div>
                </div>
                
                {/* Login Form */}
                <form onSubmit={handleSubmit} className="space-y-6">
                  {errors.general && (
                    <div className="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
                      {errors.general}
                    </div>
                  )}
                  
                  <Input
                    label="Email*"
                    type="email"
                    name="email"
                    value={formData.email}
                    onChange={handleChange}
                    placeholder="Digite seu email"
                    error={errors.email}
                    required
                  />
                  
                  <Input
                    label="Senha*"
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
            
            {/* Right Side - Image/Info */}
            <div className="lg:w-1/2 bg-blue-50 p-12 flex items-center justify-center">
              <div className="text-center max-w-md">
                <h2 className="text-3xl font-bold text-gray-900 mb-4">
                  Junte-se a nós para promover a saúde mental
                </h2>
                <p className="text-gray-700">
                  Acesse nossa plataforma hoje e embarque em uma jornada de apoio e transformação.
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

export default Login;