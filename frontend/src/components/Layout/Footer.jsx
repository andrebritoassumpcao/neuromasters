import { Facebook, Instagram, Youtube } from 'lucide-react';

const Footer = () => {
  return (
    <footer className="bg-blue-300 text-white">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div className="border-b border-blue-200 pb-8 mb-8">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div className="space-y-4">
              <h4 className="text-lg font-semibold">Coluna um</h4>
              <ul className="space-y-2">
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
              </ul>
            </div>
            
            <div className="space-y-4">
              <h4 className="text-lg font-semibold">Coluna dois</h4>
              <ul className="space-y-2">
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
              </ul>
            </div>
            
            <div className="space-y-4">
              <h4 className="text-lg font-semibold">Coluna tres</h4>
              <ul className="space-y-2">
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
                <li><a href="#" className="hover:text-blue-100 transition-colors">Twenty One</a></li>
              </ul>
            </div>
            
            <div className="space-y-4">
              <h4 className="text-lg font-semibold">Junte-se a nós</h4>
              <div className="flex space-x-4">
                <a href="#" className="hover:text-blue-100 transition-colors">
                  <Facebook className="w-6 h-6" />
                </a>
                <a href="#" className="hover:text-blue-100 transition-colors">
                  <Instagram className="w-6 h-6" />
                </a>
                <a href="#" className="hover:text-blue-100 transition-colors">
                  <Youtube className="w-6 h-6" />
                </a>
              </div>
            </div>
          </div>
        </div>
        
        <div className="flex flex-col md:flex-row justify-between items-center">
          <p className="text-sm">Neuromasters @ 2023. Todos os direitos reservados</p>
          <div className="flex space-x-8 mt-4 md:mt-0">
            <a href="#" className="text-sm hover:text-blue-100 transition-colors">Teste1</a>
            <a href="#" className="text-sm hover:text-blue-100 transition-colors">Teste2</a>
            <a href="#" className="text-sm hover:text-blue-100 transition-colors">Teste3</a>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;