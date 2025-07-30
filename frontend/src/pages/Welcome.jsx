import { Link } from 'react-router-dom';
import Header from '../components/Layout/Header';
import Footer from '../components/Layout/Footer';
import Button from '../components/UI/Button';

const Welcome = () => {
  return (
    <div className="min-h-screen">
      <Header />
      
      {/* Hero Section */}
      <main className="relative min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700">
        {/* Background Image Overlay */}
        <div 
          className="absolute inset-0 bg-black bg-opacity-25"
          style={{
            backgroundImage: 'url(/images/bg-welcome.jpg)',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundRepeat: 'no-repeat'
          }}
        />
        
        {/* Content */}
        <div className="relative z-10 flex items-center min-h-screen">
          <div className="max-w-2xl mx-8 lg:mx-16 p-8 bg-blue-600 bg-opacity-60 backdrop-blur-lg rounded-lg">
            <div className="space-y-6 text-white">
              <h3 className="text-xl font-bold">Portal Terapiame</h3>
              <h1 className="text-4xl lg:text-5xl font-bold leading-tight">
                Uma Revolução no tratamento de transtorno de espectro autista
              </h1>
              <h2 className="text-2xl lg:text-3xl font-bold">
                Um método inovador e eficiente para o tratamento do autismo
              </h2>
              
              <div className="flex flex-col sm:flex-row gap-6 pt-4">
                <Button 
                  as={Link} 
                  to="/cadastro" 
                  size="lg"
                  className="bg-white text-blue-600 hover:bg-gray-100 font-bold"
                >
                  Assine Já
                </Button>
                <Button 
                  as={Link} 
                  to="/servicos" 
                  variant="outline" 
                  size="lg"
                  className="border-white text-white hover:bg-white hover:text-blue-600 font-bold"
                >
                  Saiba Mais
                </Button>
              </div>
            </div>
          </div>
        </div>
      </main>
      
      <Footer />
    </div>
  );
};

export default Welcome;