import { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { Camera, Edit, Plus, X } from 'lucide-react';
import Button from '../components/UI/Button';
import Input from '../components/UI/Input';
import Card from '../components/UI/Card';

const ProfissionalPerfil = () => {
  const { id } = useParams();
  const [profissional, setProfissional] = useState(null);
  const [loading, setLoading] = useState(true);
  const [showEditModal, setShowEditModal] = useState(false);
  const [showAboutModal, setShowAboutModal] = useState(false);
  const [showCompetenciasModal, setShowCompetenciasModal] = useState(false);

  useEffect(() => {
    // Simulate API call
    setTimeout(() => {
      setProfissional({
        id: parseInt(id),
        name: 'Dr. João Silva',
        especialidade: 'Psicólogo',
        cidade: 'São Paulo',
        estado: 'SP',
        atendimento: 'Online e Presencial',
        resumo_profissional: 'Psicólogo clínico com mais de 10 anos de experiência no atendimento de crianças e adolescentes com transtornos do espectro autista. Especialista em terapia cognitivo-comportamental e intervenções precoces.',
        competencias: ['Ansiedade', 'Autoestima', 'Adolescência', 'TEA'],
        formacoes: [
          {
            id: 1,
            curso: 'Psicologia',
            instituicao_ensino: 'Universidade de São Paulo',
            formacao: 'Graduação',
            inicio_mes: 'Março',
            inicio_ano: 2008,
            fim_mes: 'Dezembro',
            fim_ano: 2012,
            descricao_curso: 'Graduação em Psicologia com ênfase em Psicologia Clínica',
            especialidades: 'Psicologia Infantil e do Adolescente'
          }
        ],
        foto: null,
        nameInitials: 'JS'
      });
      setLoading(false);
    }, 1000);
  }, [id]);

  const [expandedAbout, setExpandedAbout] = useState(false);

  if (loading) {
    return (
      <div className="min-h-screen bg-gray-50 flex items-center justify-center">
        <div className="animate-spin rounded-full h-32 w-32 border-b-2 border-blue-600"></div>
      </div>
    );
  }

  if (!profissional) {
    return (
      <div className="min-h-screen bg-gray-50 flex items-center justify-center">
        <div className="text-center">
          <h2 className="text-2xl font-bold text-gray-900 mb-4">Profissional não encontrado</h2>
        </div>
      </div>
    );
  }

  const shouldTruncateAbout = profissional.resumo_profissional.length > 500;
  const displayAbout = expandedAbout || !shouldTruncateAbout 
    ? profissional.resumo_profissional 
    : profissional.resumo_profissional.substring(0, 500) + '...';

  return (
    <div className="min-h-screen bg-gray-50">
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {/* Profile Header */}
        <Card className="mb-8 relative overflow-hidden">
          {/* Background Header */}
          <div className="absolute top-0 left-0 right-0 h-32 bg-gradient-to-r from-blue-600 to-purple-600"></div>
          
          <div className="relative pt-8 pb-6">
            <div className="flex flex-col md:flex-row items-center md:items-start gap-6">
              {/* Profile Photo */}
              <div className="relative">
                <div className="w-40 h-40 rounded-full overflow-hidden bg-blue-900 flex items-center justify-center group cursor-pointer border-4 border-white shadow-lg">
                  {profissional.foto ? (
                    <img
                      src={profissional.foto}
                      alt={profissional.name}
                      className="w-full h-full object-cover"
                    />
                  ) : (
                    <span className="text-white text-3xl font-semibold">
                      {profissional.nameInitials}
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
                    console.log('File selected:', e.target.files[0]);
                  }}
                />
              </div>
              
              {/* Professional Info */}
              <div className="flex-1 text-center md:text-left">
                <div className="flex flex-col md:flex-row md:items-start md:justify-between">
                  <div>
                    <h1 className="text-3xl font-bold text-gray-900 mb-2">
                      {profissional.name}
                    </h1>
                    <h2 className="text-xl text-gray-600 mb-2">{profissional.especialidade}</h2>
                    {profissional.cidade && profissional.estado && (
                      <h3 className="text-lg text-gray-600 mb-2">
                        {profissional.cidade} - {profissional.estado}
                      </h3>
                    )}
                  </div>
                  
                  <div className="flex flex-col items-end mt-4 md:mt-0">
                    <Button
                      variant="ghost"
                      size="sm"
                      onClick={() => setShowEditModal(true)}
                      className="mb-2"
                    >
                      <Edit className="w-4 h-4" />
                    </Button>
                    <p className="text-gray-600">
                      Atendimento: {profissional.atendimento}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </Card>

        {/* About Section */}
        <Card className="mb-8">
          <div className="flex justify-between items-center mb-4">
            <h3 className="text-xl font-bold text-gray-900">Sobre</h3>
            <Button
              variant="ghost"
              size="sm"
              onClick={() => setShowAboutModal(true)}
            >
              <Edit className="w-4 h-4" />
            </Button>
          </div>
          
          <div>
            <p className="text-gray-700 leading-relaxed mb-4">
              {displayAbout}
            </p>
            
            {shouldTruncateAbout && (
              <Button
                variant="ghost"
                size="sm"
                onClick={() => setExpandedAbout(!expandedAbout)}
                className="text-blue-600 hover:text-blue-800"
              >
                {expandedAbout ? 'Ver menos' : 'Ver mais...'}
              </Button>
            )}
          </div>
        </Card>

        {/* Academic Formation Section */}
        <Card className="mb-8">
          <div className="flex justify-between items-center mb-6">
            <h3 className="text-xl font-bold text-gray-900">Formação acadêmica</h3>
            <div className="flex gap-2">
              <Button variant="ghost" size="sm">
                <Plus className="w-4 h-4" />
              </Button>
              <Button variant="ghost" size="sm">
                <Edit className="w-4 h-4" />
              </Button>
            </div>
          </div>
          
          <div className="space-y-4">
            {profissional.formacoes.map((formacao) => (
              <div key={formacao.id} className="border border-gray-200 rounded-lg p-4">
                <div className="flex justify-between items-start mb-2">
                  <h4 className="text-lg font-semibold text-gray-900">{formacao.curso}</h4>
                  <Button variant="ghost" size="sm">
                    <Edit className="w-4 h-4" />
                  </Button>
                </div>
                <p className="text-gray-600 mb-1">
                  <strong>Instituição de Ensino:</strong> {formacao.instituicao_ensino}
                </p>
                <p className="text-gray-600 mb-1">
                  <strong>Formação:</strong> {formacao.formacao}
                </p>
                <p className="text-gray-600 mb-1">
                  <strong>Período:</strong> {formacao.inicio_mes} {formacao.inicio_ano} - {formacao.fim_mes} {formacao.fim_ano}
                </p>
                <p className="text-gray-600 mb-1">
                  <strong>Descrição:</strong> {formacao.descricao_curso}
                </p>
                <p className="text-gray-600">
                  <strong>Especialidades:</strong> {formacao.especialidades}
                </p>
              </div>
            ))}
          </div>
        </Card>

        {/* Competências Section */}
        <Card>
          <div className="flex justify-between items-center mb-6">
            <h3 className="text-xl font-bold text-gray-900">Competências</h3>
            <Button
              variant="ghost"
              size="sm"
              onClick={() => setShowCompetenciasModal(true)}
            >
              <Edit className="w-4 h-4" />
            </Button>
          </div>
          
          <div className="flex flex-wrap gap-2">
            {profissional.competencias && profissional.competencias.length > 0 ? (
              profissional.competencias.map((competencia, index) => (
                <span
                  key={index}
                  className="px-3 py-1 bg-blue-600 text-white text-sm rounded-full"
                >
                  {competencia}
                </span>
              ))
            ) : (
              <p className="text-gray-600">Nenhuma competência cadastrada.</p>
            )}
          </div>
        </Card>
      </div>
    </div>
  );
};

export default ProfissionalPerfil;