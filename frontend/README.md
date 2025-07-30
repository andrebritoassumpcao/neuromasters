# Neuromasters Frontend - React Migration

Este projeto é a migração da aplicação Laravel Blade para React com Tailwind CSS.

## 🚀 Tecnologias Utilizadas

- **React 18** - Biblioteca para construção de interfaces
- **Vite** - Build tool e dev server
- **Tailwind CSS** - Framework CSS utilitário
- **React Router** - Roteamento do lado do cliente
- **Axios** - Cliente HTTP para comunicação com APIs
- **Lucide React** - Biblioteca de ícones

## 📁 Estrutura do Projeto

```
frontend/
├── src/
│   ├── components/          # Componentes reutilizáveis
│   │   ├── Layout/         # Componentes de layout (Header, Footer, Sidebar)
│   │   └── UI/             # Componentes de interface (Button, Input, Card)
│   ├── contexts/           # Contextos React (AuthContext)
│   ├── pages/              # Páginas da aplicação
│   ├── App.jsx             # Componente principal
│   ├── main.jsx            # Ponto de entrada
│   └── index.css           # Estilos globais
├── public/                 # Arquivos estáticos
└── package.json
```

## 🎨 Componentes Convertidos

### Layout
- ✅ Header com navegação e menu de usuário
- ✅ Footer com links e redes sociais
- ✅ Sidebar com menu lateral para área logada

### Páginas
- ✅ Welcome (página inicial)
- ✅ Home (dashboard)
- ✅ Login
- ✅ Register (cadastro com steps)
- ✅ TeaApp (painel principal)
- ✅ Beneficiários (listagem e cadastro)
- ✅ Profissionais (busca e listagem)
- ✅ Perfil Profissional

### Componentes UI
- ✅ Button (botão reutilizável)
- ✅ Input (campo de entrada)
- ✅ Card (container de conteúdo)

## 🔧 Instalação e Execução

1. **Instalar dependências:**
```bash
cd frontend
npm install
```

2. **Executar em desenvolvimento:**
```bash
npm run dev
```

3. **Build para produção:**
```bash
npm run build
```

## 🔐 Autenticação

O sistema de autenticação foi implementado usando Context API do React:

- `AuthContext` gerencia o estado de autenticação
- Suporte para login de usuários e profissionais
- Armazenamento de token no localStorage
- Interceptação de requisições HTTP com Axios

## 🎨 Estilização

### Tailwind CSS
- Configuração customizada com cores do projeto
- Classes utilitárias para responsividade
- Componentes estilizados com design system consistente

### Design System
- Cores primárias: azul (#3b82f6) e roxo (#8b5cf6)
- Tipografia: Inter font
- Espaçamento: sistema baseado em 8px
- Componentes com hover states e transições

## 📱 Responsividade

Todos os componentes foram desenvolvidos com design responsivo:
- Mobile-first approach
- Breakpoints: sm (640px), md (768px), lg (1024px), xl (1280px)
- Grid system flexível
- Componentes adaptáveis

## 🔄 Integração com Backend

Para integrar com o backend Laravel:

1. **Configure as variáveis de ambiente:**
```env
VITE_API_URL=http://localhost:8000
```

2. **Atualize o AuthContext** para usar as rotas corretas da API

3. **Configure CORS** no Laravel para permitir requisições do frontend

## 📋 Próximos Passos

- [ ] Implementar todas as páginas restantes
- [ ] Adicionar validação de formulários
- [ ] Implementar upload de arquivos
- [ ] Adicionar testes unitários
- [ ] Configurar CI/CD
- [ ] Otimizar performance

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.