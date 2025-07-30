import { Link, useLocation } from 'react-router-dom';
import { 
  Home, 
  Users, 
  FileText, 
  BookOpen, 
  Lightbulb, 
  UserCheck, 
  Stethoscope 
} from 'lucide-react';

const Sidebar = () => {
  const location = useLocation();

  const menuItems = [
    {
      id: 'meu-painel',
      name: 'Meu painel',
      href: '/tea-app',
      icon: Home,
    },
    {
      id: 'beneficiarios',
      name: 'Meus Beneficiários',
      href: '/tea-app/meus-meneficiarios',
      icon: Users,
    },
    {
      id: 'atendimentos',
      name: 'Meus Atendimentos',
      href: '/tea-app/meus-atendimentos',
      icon: FileText,
    },
    {
      id: 'avaliacoes',
      name: 'Minhas Avaliações',
      href: '/tea-app/minhas-avaliacoes',
      icon: BookOpen,
    },
    {
      id: 'intervencao',
      name: 'Estratégias de Intervenção',
      href: '/tea-app/estrategias-de-intervencao',
      icon: Lightbulb,
    },
    {
      id: 'indicacoes',
      name: 'Minhas Indicações',
      href: '/tea-app/minhas-indicacoes',
      icon: UserCheck,
    },
    {
      id: 'profissionais',
      name: 'Meus Profissionais',
      href: '/tea-app/meus-profissionais',
      icon: Stethoscope,
    },
  ];

  return (
    <nav className="fixed top-20 left-0 w-80 h-screen bg-white shadow-lg border-r border-gray-200 overflow-y-auto">
      <ul className="flex flex-col">
        {menuItems.map((item) => {
          const Icon = item.icon;
          const isActive = location.pathname === item.href;
          
          return (
            <li key={item.id} className="w-full">
              <Link
                to={item.href}
                className={`flex items-center w-full h-20 px-6 transition-all duration-200 ${
                  isActive
                    ? 'bg-gray-100 text-purple-600 border-r-4 border-purple-600'
                    : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900'
                }`}
              >
                <Icon 
                  className={`w-8 h-8 mr-3 ${
                    isActive ? 'text-purple-600' : 'text-gray-500'
                  }`} 
                />
                <span className="font-medium text-base">{item.name}</span>
              </Link>
            </li>
          );
        })}
      </ul>
    </nav>
  );
};

export default Sidebar;