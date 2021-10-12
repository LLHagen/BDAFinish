import { Dropdown } from 'react-bootstrap';
import { NavLink } from 'react-router-dom';
import { connect } from 'react-redux';
import 'bootstrap/dist/css/bootstrap.min.css';
import css from './header.module.css';

function Header(props) {
  return (
    <nav className={`row navbar navbar-expand-lg navbar-light bg-light ${css.wrapper}`}>
      <div className={`col`}>
        <NavLink className={`navbar-brand ${css.logo}`} to="/">CRM</NavLink>
        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-icon"></span>
        </button>
      </div>
      <div className={`col-auto ${css.profile}`}>
        <Dropdown>
          <Dropdown.Toggle> {props.userName}</Dropdown.Toggle>
          <Dropdown.Menu>
            {/* <Dropdown.Item href="/userSettings">Настройки</Dropdown.Item> */}
            <Dropdown.Item><NavLink to='../authorization'>Выход</NavLink></Dropdown.Item>
          </Dropdown.Menu>
        </Dropdown>
      </div>
    </nav>
  );
}

const mapStateToProps = (state) => {
  let s = state.authorization;
  return {
    userName: s.userName
  }
}

export default connect(mapStateToProps)(Header);
