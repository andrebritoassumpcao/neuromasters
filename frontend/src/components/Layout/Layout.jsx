import Header from './Header';
import Footer from './Footer';
import Sidebar from './Sidebar';

const Layout = ({ children, showSidebar = true }) => {
  return (
    <div className="min-h-screen bg-gray-50">
      <Header />
      <div className="flex">
        {showSidebar && <Sidebar />}
        <main className={`flex-1 ${showSidebar ? 'ml-80' : ''}`}>
          {children}
        </main>
      </div>
      <Footer />
    </div>
  );
};

export default Layout;