import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { Plus, User } from 'lucide-react';
import Card from '../components/UI/Card';

const Beneficiarios = () => {
  const [beneficiarios, setBeneficiarios] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    // Simulate API call
    setTimeout(() => {
      setBeneficiarios([
        {
          id: 1,
          nome_beneficiario: 'João Silva',
          nameInitials: 'JS',
          foto: null
        },
        {
          id: 2,
          nome_beneficiario: 'Maria Santos',
          nameInitials: 'MS',
          foto: null
        }
      ]);
      setLoading(false);
    }, 1000);
  }, []);

  const getInitials = (name) => {
    const words = name.split(' ');
    if (words.length >= 2) {
      return words[0][0] + words[words.length - 1][0];
    }
    return words[0][0];
  };

  if (loading) {
    return (
      <div className="min-h-screen bg-gray-50 flex items-center justify-center">
        <div className="animate-spin rounded-full h-32 w-32 border-b-2 border-blue-600"></div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <Card>
          <h2 className="text-2xl font-bold text-gray-900 mb-8">Meus Beneficiários</h2>
          
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {/* Add New Beneficiary Card */}
            <Link
              to="/tea-app/cadastrar-beneficiario"
              className="group relative bg-blue-100 rounded-2xl p-6 h-64 flex flex-col items-center justify-center hover:bg-blue-200 transition-all duration-300 hover:scale-105 cursor-pointer"
            >
              <div className="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:bg-blue-700 transition-colors">
                <Plus className="w-10 h-10 text-white" />
              </div>
              <span className="text-white font-medium text-center bg-gradient-to-t from-blue-600 to-transparent p-3 rounded-b-2xl w-full">
                Cadastre um novo Beneficiário
              </span>
            </Link>

            {/* Beneficiary Cards */}
            {beneficiarios.map((beneficiario) => (
              <Link
                key={beneficiario.id}
                to={`/tea-app/meu-beneficiario/${beneficiario.id}`}
                className="group relative bg-blue-100 rounded-2xl overflow-hidden h-64 hover:scale-105 transition-all duration-300 cursor-pointer"
              >
                <div className="h-full flex flex-col">
                  <div className="flex-1 flex items-center justify-center">
                    {beneficiario.foto ? (
                      <img
                        src={beneficiario.foto}
                        alt={beneficiario.nome_beneficiario}
                        className="w-full h-full object-cover"
                      />
                    ) : (
                      <div className="w-20 h-20 bg-blue-900 rounded-full flex items-center justify-center">
                        <span className="text-white text-2xl font-semibold">
                          {getInitials(beneficiario.nome_beneficiario)}
                        </span>
                      </div>
                    )}
                  </div>
                  <div className="bg-gradient-to-t from-blue-600 to-transparent p-3">
                    <span className="text-white font-medium text-center block">
                      {beneficiario.nome_beneficiario}
                    </span>
                  </div>
                </div>
              </Link>
            ))}
          </div>
        </Card>
      </div>
    </div>
  );
};

export default Beneficiarios;