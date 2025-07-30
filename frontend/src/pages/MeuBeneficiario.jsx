import { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { ArrowLeft, Camera, FileText } from 'lucide-react';
import Button from '../components/UI/Button';
import Card from '../components/UI/Card';

const MeuBeneficiario = () => {
  const { id } = useParams();
  const navigate = useNavigate();
  const [beneficiario, setBeneficiario] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    // Simulate API call
    setTimeout(() => {
      setBeneficiario({
        id: parseInt(id),
        nome_beneficiario: 'João Silva',
        nameInitials: 'JS',
        foto: null,
        cidade: 'São Paulo',
        estado: 'SP',
        diagnostico_principal: 'Transtorno do Espectro Autista',
        data_nascimento: '2015-03-15'
      });
      setLoading(false);
    }, 1000);
  }, [id]);

  const calculateAge = (birthDate) => {
    const today = new Date();
    const birth = new Date(birthDate);
    let age = today.getFullYear() - birth.getFullYear();
    const monthDiff = today.getMonth() - birth.getMonth();
    
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
      age--;
    }
    
    return age;
  };

  if (loading) {
    return (
      <div className="min-h-screen bg-gray-50 flex items-center justify-center">
        <div className="animate-spin rounded-full h-32 w-32 border-b-2 border-blue-600"></div>
      </div>
    );
  }

  if (!beneficiario) {
    return (
      <div className="min-h-screen bg-gray-50 flex items-center justify-center">
        <div className="text-center">
          <h2 className="text-2xl font-bold text-gray-900 mb-4">Beneficiário não encontrado</h2>
          <Button onClick={() => navigate('/tea-app/meus-meneficiarios')}>
            Voltar para Beneficiários
          </Button>
        </div>
      </div>
    );
  }

  const idade = calculateAge(beneficiario.data_nascimento);

  return (
    <div className="min-h-screen bg-gray-50">
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <Button
          variant="ghost"
          onClick={() => navigate('/tea-app/meus-meneficiarios')}
          className="mb-6 p-2"
        >
          <ArrowLeft className="w-4 h-4 mr-2" />
          Voltar
        </Button>
        
        <Card className="mb-8">
          <div className="flex flex-col md:flex-row items-center md:items-start gap-8">
            {/* Profile Photo */}
            <div className="relative">
              <div className="w-44 h-44 rounded-full overflow-hidden bg-blue-900 flex items-center justify-center group cursor-pointer">
                {beneficiario.foto ? (
                  <img
                    src={beneficiario.foto}
                    alt={beneficiario.nome_beneficiario}
                    className="w-full h-full object-cover"
                  />
                ) : (
                  <span className="text-white text-4xl font-semibold">
                    {beneficiario.nameInitials}
                  </span>
                )}
                
                {/* Overlay */}
                <div className="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                  <Camera className="w-8 h-8 text-white" />
                </div>
              </div>
              
              <input
                type="file"
                accept="image/*"
                className="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                onChange={(e) => {
                  // Handle file upload
                  console.log('File selected:', e.target.files[0]);
                }}
              />
            </div>
            
            {/* Beneficiary Info */}
            <div className="flex-1 text-center md:text-left">
              <h2 className="text-3xl font-bold text-gray-900 mb-2">
                {beneficiario.nome_beneficiario}
              </h2>
              <h3 className="text-xl text-gray-600 mb-2">{idade} Anos</h3>
              <h3 className="text-lg text-gray-600">
                {beneficiario.cidade}, {beneficiario.estado}
              </h3>
            </div>
          </div>
        </Card>
        
        {/* General Information */}
        <Card className="mb-8">
          <div className="flex justify-between items-start mb-6">
            <div>
              <h2 className="text-2xl font-bold text-gray-900 mb-2">Informações gerais</h2>
              <span className="text-gray-600">
                Diagnóstico Principal: {beneficiario.diagnostico_principal}
              </span>
            </div>
          </div>
          
          <div className="flex flex-col lg:flex-row items-center gap-8">
            {/* Questionnaire Icon */}
            <div className="flex flex-col items-center">
              <div className="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center mb-4">
                <FileText className="w-16 h-16 text-gray-600" />
              </div>
              <Button size="lg" className="w-48">
                Preencher Questionário
              </Button>
            </div>
            
            {/* Questionnaire Info */}
            <div className="flex-1 max-w-2xl">
              <h3 className="text-xl font-semibold text-gray-900 mb-4">
                Questionário de Apresentação do Paciente
              </h3>
              <p className="text-gray-700 mb-4 leading-relaxed">
                Complete o questionário de apresentação do paciente para garantir que todas as informações
                essenciais estejam sempre disponíveis para os profissionais de saúde. Isso permitirá um acompanhamento mais
                eficaz do progresso do tratamento.
              </p>
              <span className="text-gray-800 font-medium">
                Juntos, vamos construir um caminho de desenvolvimento e evolução de forma personalizada para o
                futuro do seu filho.
              </span>
            </div>
          </div>
        </Card>
      </div>
    </div>
  );
};

export default MeuBeneficiario;