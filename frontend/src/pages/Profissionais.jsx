import { useState, useEffect } from 'react';
import { Search } from 'lucide-react';
import Header from '../components/Layout/Header';
import Footer from '../components/Layout/Footer';
import Button from '../components/UI/Button';
import Input from '../components/UI/Input';
import Card from '../components/UI/Card';

const Profissionais = () => {
  const [profissionais, setProfissionais] = useState([]);
  const [loading, setLoading] = useState(true);
  const [filters, setFilters] = useState({
    name: '',
    profissao: '',
    competencia: ''
  });

  useEffect(() => {
    // Simulate API call
    setTimeout(() => {
      setProfissionais([
        {
          id: 1,
          name: 'Dr. João Silva',
          especialidade: 'Psicólogo',
          cidade: 'São Paulo',
          estado: 'SP',
          atendimento: 'Online e Presencial',
          competencias: ['Ansiedade', 'Autoestima', 'Adolescência'],
          foto: null
        },
        {
          id: 2,
          name: 'Dra. Maria Santos',
          especialidade: 'Terapeuta Ocupacional',
          cidade: 'Rio de Janeiro',
          estado: 'RJ',
          atendimento: 'Presencial',
          competencias: ['Casais', 'Autoestima'],
          foto: null
        }
      ]);
      setLoading(false);
    }, 1000);
  }, []);

  const handleFilterChange = (e) => {
    const { name, value } = e.target;
    setFilters(prev => ({
      ...prev,
      [name]: value
    }));
  };

  const handleSearch = (e) => {
    e.preventDefault();
    // Implement search logic here
    console.log('Searching with filters:', filters);
  };

  const getInitials = (name) => {
    const words = name.split(' ');
    if (words.length >= 2) {
      return words[0][0] + words[words.length - 1][0];
    }
    return words[0][0];
  };

  return (
    <div className="min-h-screen bg-gray-50">
      <Header />
      
      {/* Hero Section */}
      <section className="bg-gray-900 text-white py-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col lg:flex-row items-center justify-between">
            <div className="lg:w-1/2 mb-8 lg:mb-0">
              <h1 className="text-4xl lg:text-5xl font-bold mb-4">
                Conheça nossos <span className="text-blue-400">Profissionais</span>
              </h1>
              <h5 className="text-xl text-gray-300">
                Encontre os melhores profissionais de saúde aqui. Filtre por tema ou por profissão e entre em
                contato diretamente com eles.
              </h5>
            </div>
            <div className="lg:w-1/2 flex justify-center">
              <img 
                src="/images/Imagem profisisonais.png" 
                alt="Profissionais" 
                className="max-w-full h-auto"
              />
            </div>
          </div>
        </div>
      </section>
      
      {/* Search Section */}
      <section className="py-16">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 className="text-3xl font-bold text-gray-900 text-center mb-8">
            Encontre o Profissional ideal para você
          </h1>
          
          <Card>
            <form onSubmit={handleSearch} className="space-y-6">
              <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                <Input
                  label="Procure pelo nome"
                  name="name"
                  value={filters.name}
                  onChange={handleFilterChange}
                  placeholder="Digite o nome"
                />
                
                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">
                    Procure por Profissão
                  </label>
                  <select
                    name="profissao"
                    value={filters.profissao}
                    onChange={handleFilterChange}
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
                </div>
                
                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">
                    Procure por Competência
                  </label>
                  <select
                    name="competencia"
                    value={filters.competencia}
                    onChange={handleFilterChange}
                    className="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  >
                    <option value="">Selecione</option>
                    <option value="Casais">Casais</option>
                    <option value="Autoestima">Autoestima</option>
                    <option value="Adolescência">Adolescência</option>
                    <option value="Ansiedade">Ansiedade</option>
                  </select>
                </div>
              </div>
              
              <div className="flex justify-center">
                <Button type="submit" size="lg">
                  <Search className="w-5 h-5 mr-2" />
                  Pesquisar
                </Button>
              </div>
            </form>
          </Card>
        </div>
      </section>
      
      {/* Results Section */}
      <section className="pb-16">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          {loading ? (
            <div className="flex justify-center">
              <div className="animate-spin rounded-full h-32 w-32 border-b-2 border-blue-600"></div>
            </div>
          ) : (
            <div className="space-y-6">
              {profissionais.map((profissional) => (
                <Card key={profissional.id} className="hover:shadow-lg transition-shadow">
                  <div className="flex items-start space-x-4">
                    {/* Profile Photo */}
                    <div className="flex-shrink-0">
                      {profissional.foto ? (
                        <img
                          src={profissional.foto}
                          alt={profissional.name}
                          className="w-20 h-20 rounded-full object-cover"
                        />
                      ) : (
                        <div className="w-20 h-20 bg-gray-400 rounded-full flex items-center justify-center">
                          <span className="text-white text-xl font-semibold">
                            {getInitials(profissional.name)}
                          </span>
                        </div>
                      )}
                    </div>
                    
                    {/* Professional Info */}
                    <div className="flex-1">
                      <h3 className="text-xl font-semibold text-gray-900 mb-2">
                        {profissional.name}
                      </h3>
                      
                      {profissional.especialidade && (
                        <p className="text-gray-600 mb-1">{profissional.especialidade}</p>
                      )}
                      
                      {profissional.cidade && profissional.estado && (
                        <p className="text-gray-600 mb-1">
                          {profissional.cidade} - {profissional.estado}
                        </p>
                      )}
                      
                      {profissional.atendimento && (
                        <p className="text-gray-600 mb-3">
                          <strong>Atendimento:</strong> {profissional.atendimento}
                        </p>
                      )}
                      
                      {/* Competências */}
                      {profissional.competencias && profissional.competencias.length > 0 && (
                        <div className="flex flex-wrap gap-2">
                          {profissional.competencias.map((competencia, index) => (
                            <span
                              key={index}
                              className="px-3 py-1 bg-blue-600 text-white text-sm rounded-full"
                            >
                              {competencia}
                            </span>
                          ))}
                        </div>
                      )}
                    </div>
                  </div>
                </Card>
              ))}
            </div>
          )}
        </div>
      </section>
      
      <Footer />
    </div>
  );
};

export default Profissionais;