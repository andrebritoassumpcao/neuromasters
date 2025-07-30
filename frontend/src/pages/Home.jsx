import { Link } from 'react-router-dom';
import Button from '../components/UI/Button';
import Card from '../components/UI/Card';

const Home = () => {
  return (
    <div className="min-h-screen bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {/* Banner Section */}
        <div className="mb-12">
          <div 
            className="relative h-96 rounded-xl overflow-hidden shadow-lg"
            style={{
              backgroundImage: 'url(/images/banner-home-1.jpg)',
              backgroundSize: 'cover',
              backgroundPosition: 'center'
            }}
          >
            <div className="absolute inset-0 bg-black bg-opacity-30" />
            <div className="relative z-10 flex items-end h-full p-8">
              <Button 
                as={Link} 
                to="/tea-app" 
                size="lg"
                className="bg-blue-600 text-white hover:bg-blue-700"
              >
                Nossos Produtos
              </Button>
            </div>
          </div>
        </div>

        {/* Main Product Section */}
        <div className="space-y-8">
          <h2 className="text-3xl font-bold text-gray-900">Neuromasters - TEA</h2>
          
          <Card className="flex flex-col lg:flex-row overflow-hidden shadow-lg">
            <div className="lg:w-1/3">
              <img 
                src="/images/img-produto-tea.jpg" 
                alt="Produto TEA"
                className="w-full h-64 lg:h-full object-cover"
              />
            </div>
            
            <div className="lg:w-2/3 p-8 space-y-6">
              <p className="text-lg text-gray-700 leading-relaxed">
                O <span className="font-semibold text-gray-900">Terapiame - TEA</span> é uma plataforma com uma abordagem revolucionária para auxiliar crianças
                no espectro autista a alcançarem seu potencial máximo de desenvolvimento, através de uma plataforma interativa e
                inovadora.
              </p>
              
              <p className="text-lg text-gray-700 leading-relaxed">
                O <span className="font-semibold text-gray-900">Terapiame - TEA</span> oferece um novo caminho, aliando equipes multidisciplinares de
                profissionais, tecnologia e um método reconhecido e eficiente no tratamento do espectro autista
              </p>
              
              <div className="pt-4">
                <Button 
                  as={Link} 
                  to="/tea-app" 
                  size="lg"
                >
                  Saiba Mais
                </Button>
              </div>
            </div>
          </Card>
        </div>
      </div>
    </div>
  );
};

export default Home;