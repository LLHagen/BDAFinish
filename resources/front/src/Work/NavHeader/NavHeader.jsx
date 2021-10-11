import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.js';

import Tools from './Tools/Tools.jsx';
import Header from './Header/Header.jsx';

function NavHeader() {
  return (
    <div className="wrapper">
      <Header />
      <Tools />
    </div>
  );
}

export default NavHeader;