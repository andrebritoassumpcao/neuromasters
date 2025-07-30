import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { Check, ArrowLeft } from 'lucide-react';
import Button from '../components/UI/Button';
import Input from '../components/UI/Input';
import Card from '../components/UI/Card';

const CadastrarBeneficiario = () => {
  const [currentStep, setCurrentStep] = useState(0);
  const [formData, setFormData] = useState({
    name: '',
    nascimento: '',
    sexo: '',
    peso: '',
    altura: '',
    cpf: '',
    celular: '',
    identidade: '',
    emissao: '',
    orgao: '',
    diagnostico: '',
    diagnostico_detalhes: '',
    nome_mae: '',
    cpf_mae: '',
    profissao_mae: '',
    nome_pai: '',
    cpf_pai: '',
    profissao_pai: '',
    estado_civil_pais: '',
    cep: '',
    logradouro: '',
    bairro: '',
    uf: '',
    localidade: '',
    numero: '',
    complemento: ''
  });
  const [errors, setErrors] = useState({});
  const [loading, setLoading] = useState(false);
  
  const navigate = useNavigate();

  const steps = [
    'Dados Pessoais',
    'Detalhes',
    'Dados dos Responsáveis',
    'Endereço'
  ];

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
      if (!formData.nascimento) newErrors.nascimento = 'Data de nascimento é obrigatória';
      if (!formData.sexo) newErrors.sexo = 'Sexo é obrigatório';
      if (!formData.cpf) newErrors.cpf = 'CPF é obrigatório';
      if (!formData.celular) newErrors.celular = 'Celular é obrigatório';
      if (!formData.identidade) newErrors.identidade = 'Identidade é obrigatória';
      if (!formData.emissao) newErrors.emissao = 'Data de emissão é obrigatória';
      if (!formData.orgao) newErrors.orgao = 'Órgão emissor é obrigatório';
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
    
    // Simulate API call
    setTimeout(() => {
      setLoading(false);
      navigate('/tea-app/meus-meneficiarios');
    }, 2000);
  };

  const renderStepContent = () => {
    switch (currentStep) {
      case 0:
        return (
          <div className="space-y-6">
            <Input
              label="Nome Completo*"
              name="name"
              value={formData.name}
              onChange={handleChange}
              error={errors.name}
            />
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <Input
                label="Data de nascimento*"
                type="date"
                name="nascimento"
                value={formData.nascimento}
                onChange={handleChange}
                error={errors.nascimento}
              />
              
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">
                  Sexo*
                </label>
                <select
                  name="sexo"
                  value={formData.sexo}
                  onChange={handleChange}
                  className="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                  <option value="">Selecione</option>
                  <option value="masculino">Masculino</option>
                  <option value="feminino">Feminino</option>
                  <option value="outros">Outros</option>
                </select>
                {errors.sexo && (
                  <p className="text-sm text-red-600 mt-1">{errors.sexo}</p>
                )}
              </div>
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <Input
                label="Peso"
                name="peso"
                value={formData.peso}
                onChange={handleChange}
                placeholder="Ex: 25.5"
              />
              
              <Input
                label="Altura"
                name="altura"
                value={formData.altura}
                onChange={handleChange}
                placeholder="Ex: 1.20"
              />
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <Input
                label="CPF*"
                name="cpf"
                value={formData.cpf}
                onChange={handleChange}
                error={errors.cpf}
              />
              
              <Input
                label="Celular*"
                name="celular"
                value={formData.celular}
                onChange={handleChange}
                error={errors.celular}
              />
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <Input
                label="Identidade*"
                name="identidade"
                value={formData.identidade}
                onChange={handleChange}
                error={errors.identidade}
              />
              
              <Input
                label="Data de emissão*"
                type="date"
                name="emissao"
                value={formData.emissao}
                onChange={handleChange}
                error={errors.emissao}
              />
            </div>
            
            <Input
              label="Órgão emissor*"
              name="orgao"
              value={formData.orgao}
              onChange={handleChange}
              error={errors.orgao}
            />
          </div>
        );
        
      case 1:
        return (
          <div className="space-y-6">
            <Input
              label="Diagnóstico Principal"
              name="diagnostico"
              value={formData.diagnostico}
              onChange={handleChange}
              placeholder="Ex: Espectro Autista"
            />
            
            <div>
              <label className="block text-sm font-medium text-gray-700 mb-2">
                Detalhes do Diagnóstico
              </label>
              <textarea
                name="diagnostico_detalhes"
                value={formData.diagnostico_detalhes}
                onChange={handleChange}
                placeholder="Digite os detalhes do diagnóstico..."
                rows={4}
                className="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
              />
            </div>
          </div>
        );
        
      case 2:
        return (
          <div className="space-y-6">
            <Input
              label="Nome da Mãe"
              name="nome_mae"
              value={formData.nome_mae}
              onChange={handleChange}
            />
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <Input
                label="CPF"
                name="cpf_mae"
                value={formData.cpf_mae}
                onChange={handleChange}
              />
              
              <Input
                label="Profissão"
                name="profissao_mae"
                value={formData.profissao_mae}
                onChange={handleChange}
              />
            </div>
            
            <Input
              label="Nome do Pai"
              name="nome_pai"
              value={formData.nome_pai}
              onChange={handleChange}
            />
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <Input
                label="CPF"
                name="cpf_pai"
                value={formData.cpf_pai}
                onChange={handleChange}
              />
              
              <Input
                label="Profissão"
                name="profissao_pai"
                value={formData.profissao_pai}
                onChange={handleChange}
              />
            </div>
            
            <Input
              label="Estado civil dos pais"
              name="estado_civil_pais"
              value={formData.estado_civil_pais}
              onChange={handleChange}
            />
          </div>
        );
        
      case 3:
        return (
          <div className="space-y-6">
            <Input
              label="CEP"
              name="cep"
              value={formData.cep}
              onChange={handleChange}
              placeholder="Digite o CEP"
            />
            
            <Input
              label="Rua"
              name="logradouro"
              value={formData.logradouro}
              onChange={handleChange}
            />
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <Input
                label="Bairro"
                name="bairro"
                value={formData.bairro}
                onChange={handleChange}
              />
              
              <Input
                label="Estado"
                name="uf"
                value={formData.uf}
                onChange={handleChange}
              />
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <Input
                label="Cidade"
                name="localidade"
                value={formData.localidade}
                onChange={handleChange}
              />
              
              <Input
                label="Número"
                name="numero"
                value={formData.numero}
                onChange={handleChange}
              />
            </div>
            
            <Input
              label="Complemento"
              name="complemento"
              value={formData.complemento}
              onChange={handleChange}
            />
          </div>
        );
        
      default:
        return null;
    }
  };

  return (
    <div className="min-h-screen bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div className="flex">
          {/* Sidebar */}
          <div className="w-80 bg-blue-50 rounded-lg p-6 mr-8">
            <Button
              variant="ghost"
              onClick={() => navigate('/tea-app/meus-meneficiarios')}
              className="mb-6 p-2"
            >
              <ArrowLeft className="w-4 h-4 mr-2" />
              Voltar
            </Button>
            
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
                      {index === 0 && 'Insira aqui os dados do beneficiário'}
                      {index === 1 && 'Insira aqui os detalhes do beneficiário'}
                      {index === 2 && 'Insira aqui os dados dos responsáveis pelo beneficiário.'}
                      {index === 3 && 'Insira aqui o endereço do beneficiário.'}
                    </p>
                  </div>
                </div>
              ))}
            </div>
          </div>
          
          {/* Main Content */}
          <div className="flex-1">
            <Card>
              <form onSubmit={currentStep === 3 ? handleSubmit : (e) => e.preventDefault()}>
                {renderStepContent()}
                
                <div className="flex justify-center mt-8">
                  {currentStep < 3 ? (
                    <Button onClick={nextStep} size="lg">
                      Continuar
                    </Button>
                  ) : (
                    <div className="flex gap-4">
                      <Button variant="secondary" onClick={prevStep} size="lg">
                        Voltar
                      </Button>
                      <Button type="submit" loading={loading} size="lg">
                        Finalizar Cadastro
                      </Button>
                    </div>
                  )}
                </div>
              </form>
            </Card>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CadastrarBeneficiario;