import { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';
import Header from '../components/Layout/Header';
import Footer from '../components/Layout/Footer';
import Button from '../components/UI/Button';
import Input from '../components/UI/Input';
import { Check } from 'lucide-react';

const Register = () => {
  const [currentStep, setCurrentStep] = useState(0);
  const [userType, setUserType] = useState('cliente');
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    celular: '',
    password: '',
    confirmPassword: '',
    // Professional fields
    conselho_regional: '',
    numero_conselho: '',
    especialidade: '',
    resumo_profissional: ''
  });
  const [errors, setErrors] = useState({});
  const [loading, setLoading] = useState(false);
  
  const { register } = useAuth();
  const navigate = useNavigate();

  const steps = userType === 'profissional' 
    ? ['Seus Detalhes', 'Dados Profissionais', 'Definir Senha', 'Confirmar Cadastro']
    : ['Seus Detalhes', 'Definir Senha', 'Confirmar Cadastro'];

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

  const validateStep = () => {
    const newErrors = {};
    
    if (currentStep === 0) {
      if (!formData.name) newErrors.name = 'Nome é obrigatório';
      if (!formData.email) newErrors.email = 'Email é obrigatório';
      if (!formData.celular) newErrors.celular = 'Celular é obrigatório';
    }
    
    if (currentStep === 1 && userType === 'profissional') {
      if (!formData.conselho_regional) newErrors.conselho_regional = 'Conselho Regional é obrigatório';
      if (!formData.numero_conselho) newErrors.numero_conselho = 'Número do conselho é obrigatório';
      if (!formData.especialidade) newErrors.especialidade = 'Especialidade é obrigatória';
    }
    
    const passwordStep = userType === 'profissional' ? 2 : 1;
    if (currentStep === passwordStep) {
      if (!formData.password) newErrors.password = 'Senha é obrigatória';
      if (formData.password.length < 8) newErrors.password = 'Senha deve ter pelo menos 8 caracteres';
      if (formData.password !== formData.confirmPassword) {
        newErrors.confirmPassword = 'Senhas não coincidem';
      }
    }
    
    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const nextStep = () => {
    if (validateStep()) {
      setCurrentStep(prev => prev + 1);
    }
  };

  const prevStep = () => {
    setCurrentStep(prev => prev - 1);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    
    const result = await register(formData);
    
    if (result.success) {
      navigate('/login');
    } else {
      setErrors({ general: result.error });
    }
    
    setLoading(false);
  };

  const renderStepContent = () => {
    switch (currentStep) {
      case 0:
        return (
          <div className="space-y-6">
            <div className="text-center mb-8">
              <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <Check className="w-6 h-6 text-blue-600" />
              </div>
              <h2 className="text-3xl font-bold text-gray-900 mb-2">Seus Detalhes</h2>
              <p className="text-gray-600">Por favor, insira aqui seu nome, email e celular</p>
            </div>
            
            <Button variant="outline" className="w-full py-3 border-gray-300">
              <img src="/images/google logo.svg" alt="Google" className="w-5 h-5 mr-3" />
              Entrar com o Google
            </Button>
            
            <div className="flex items-center">
              <div className="flex-1 h-px bg-gray-300"></div>
              <span className="px-4 text-gray-500">OU</span>
              <div className="flex-1 h-px bg-gray-300"></div>
            </div>
            
            <Input
              label="Nome Completo:"
              name="name"
              value={formData.name}
              onChange={handleChange}
              placeholder="Digite seu nome completo"
              error={errors.name}
            />
            
            <Input
              label="Email:"
              type="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              placeholder="Digite seu email"
              error={errors.email}
            />
            
            <Input
              label="Celular:"
              name="celular"
              value={formData.celular}
              onChange={handleChange}
              placeholder="Digite seu número de celular"
              error={errors.celular}
            />
            
            <Button onClick={nextStep} className="w-full py-3">
              Continuar
            </Button>
          </div>
        );
        
      case 1:
        if (userType === 'profissional') {
          return (
            <div className="space-y-6">
              <div className="text-center mb-8">
                <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Check className="w-6 h-6 text-blue-600" />
                </div>
                <h2 className="text-3xl font-bold text-gray-900 mb-2">Dados Profissionais</h2>
                <p className="text-gray-600">Por favor, seus dados profissionais</p>
              </div>
              
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <Input
                  label="Conselho Regional:"
                  name="conselho_regional"
                  value={formData.conselho_regional}
                  onChange={handleChange}
                  placeholder="Ex: CRP"
                  error={errors.conselho_regional}
                />
                
                <Input
                  label="Número de Registro Profissional:"
                  name="numero_conselho"
                  value={formData.numero_conselho}
                  onChange={handleChange}
                  placeholder="Número de Registro"
                  error={errors.numero_conselho}
                />
              </div>
              
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">
                  Especialidade:
                </label>
                <select
                  name="especialidade"
                  value={formData.especialidade}
                  onChange={handleChange}
                  className="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                  <option value="">Selecione</option>
                  <option value="Médico Pediatra">Médico Pediatra</option>
                  <option value="Psicólogo">Psicólogo</option>
                  <option value="Psiquiatra">Psiquiatra</option>
                  <option value="Terapeuta Ocupacional">Terapeuta Ocupacional</option>
                  <option value="Terapeuta Sensorial">Terapeuta Sensorial</option>
                  <option value="Nutricionista / Nutrólogo">Nutricionista / Nutrólogo</option>
                </select>
                {errors.especialidade && (
                  <p className="text-sm text-red-600 mt-1">{errors.especialidade}</p>
                )}
              </div>
              
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">
                  Resumo Profissional:
                </label>
                <textarea
                  name="resumo_profissional"
                  value={formData.resumo_profissional}
                  onChange={handleChange}
                  placeholder="Digite um resumo profissional"
                  rows={4}
                  className="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                />
              </div>
              
              <div className="flex gap-4">
                <Button variant="secondary" onClick={prevStep} className="flex-1">
                  Voltar
                </Button>
                <Button onClick={nextStep} className="flex-1">
                  Continuar
                </Button>
              </div>
            </div>
          );
        }
        // Fall through to password step for regular users
        
      case (userType === 'profissional' ? 2 : 1):
        return (
          <div className="space-y-6">
            <div className="text-center mb-8">
              <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <Check className="w-6 h-6 text-blue-600" />
              </div>
              <h2 className="text-3xl font-bold text-gray-900 mb-2">Definir Senha</h2>
              <p className="text-gray-600">A senha deve ter no mínimo 8 caracteres</p>
            </div>
            
            <Input
              label="Senha:"
              type="password"
              name="password"
              value={formData.password}
              onChange={handleChange}
              placeholder="Digite sua senha"
              error={errors.password}
            />
            
            <Input
              label="Confirmar Senha:"
              type="password"
              name="confirmPassword"
              value={formData.confirmPassword}
              onChange={handleChange}
              placeholder="Confirme sua senha"
              error={errors.confirmPassword}
            />
            
            <div className="flex gap-4">
              <Button variant="secondary" onClick={prevStep} className="flex-1">
                Voltar
              </Button>
              <Button onClick={nextStep} className="flex-1">
                Continuar
              </Button>
            </div>
          </div>
        );
        
      default:
        return (
          <div className="space-y-6">
            <div className="text-center mb-8">
              <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <Check className="w-6 h-6 text-blue-600" />
              </div>
              <h2 className="text-3xl font-bold text-gray-900 mb-2">Confirmar Cadastro</h2>
              <p className="text-gray-600">
                Por favor, verifique sua caixa de entrada e insira o código no espaço abaixo para completar o processo de verificação
              </p>
            </div>
            
            <div className="flex justify-center gap-2">
              {[1, 2, 3, 4, 5, 6].map((i) => (
                <input
                  key={i}
                  type="text"
                  maxLength="1"
                  className="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="-"
                />
              ))}
            </div>
            
            <p className="text-sm text-gray-600 text-center">
              Caso não tenha recebido o email de verificação, verifique sua pasta de spam ou lixo eletrônico.
            </p>
            
            <div className="flex gap-4">
              <Button variant="secondary" onClick={prevStep} className="flex-1">
                Voltar
              </Button>
              <Button onClick={handleSubmit} loading={loading} className="flex-1">
                Finalizar Cadastro
              </Button>
            </div>
          </div>
        );
    }
  };

  return (
    <div className="min-h-screen bg-gray-200">
      <Header />
      
      <div className="flex items-center justify-center min-h-screen py-12">
        <div className="bg-white rounded-2xl shadow-xl overflow-hidden max-w-6xl w-full mx-4">
          <div className="flex flex-col lg:flex-row">
            {/* Left Side - Steps */}
            <div className="lg:w-1/3 bg-blue-50 p-8">
              <div className="space-y-6">
                {steps.map((step, index) => (
                  <div
                    key={index}
                    className={`flex items-center space-x-3 p-3 rounded-lg cursor-pointer transition-colors ${
                      index === currentStep
                        ? 'bg-blue-100 text-blue-700'
                        : index < currentStep
                        ? 'text-green-600'
                        : 'text-gray-500'
                    }`}
                    onClick={() => index < currentStep && setCurrentStep(index)}
                  >
                    <div className={`w-8 h-8 rounded-full flex items-center justify-center ${
                      index === currentStep
                        ? 'bg-blue-600 text-white'
                        : index < currentStep
                        ? 'bg-green-600 text-white'
                        : 'bg-gray-300 text-gray-600'
                    }`}>
                      {index < currentStep ? <Check className="w-4 h-4" /> : index + 1}
                    </div>
                    <div>
                      <h3 className="font-semibold">{step}</h3>
                      <p className="text-sm opacity-75">
                        {index === 0 && 'Por favor, insira aqui seu nome e email'}
                        {index === 1 && userType === 'profissional' && 'Insira aqui seus dados profissionais'}
                        {index === 1 && userType !== 'profissional' && 'A senha deve ter no mínimo 8 caracteres.'}
                        {index === 2 && userType === 'profissional' && 'A senha deve ter no mínimo 8 caracteres.'}
                        {index === 2 && userType !== 'profissional' && 'Insira o código que enviamos por email.'}
                        {index === 3 && 'Insira o código que enviamos por email.'}
                      </p>
                    </div>
                  </div>
                ))}
              </div>
            </div>
            
            {/* Right Side - Form */}
            <div className="lg:w-2/3 p-12">
              <div className="max-w-md mx-auto">
                {errors.general && (
                  <div className="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-6">
                    {errors.general}
                  </div>
                )}
                
                {renderStepContent()}
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <Footer />
    </div>
  );
};

export default Register;