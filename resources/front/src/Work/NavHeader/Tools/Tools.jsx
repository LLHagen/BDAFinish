import {Dropdown, ButtonGroup, NavLink} from 'react-bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import css from './tools.module.css';

function Tools() {
  return (
    <div align="center" className={`row ${css.wrapper}`}>
      <div className={`col mx-auto ${css.buttonGroup}`}>
        <ButtonGroup>
          <Dropdown >
            <Dropdown.Toggle>Списки</Dropdown.Toggle>
            <Dropdown.Menu>
              <Dropdown.Item>Сохранить</Dropdown.Item>
              <Dropdown.Item>Скачать</Dropdown.Item>
              <Dropdown.Item>Показывать меню</Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
          <Dropdown>
            <Dropdown.Toggle className="btn-secondary">Заглушка</Dropdown.Toggle>
            <Dropdown.Menu>
              <Dropdown.Item href="bestMembers">Заглушка</Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
          {/*<Dropdown>*/}
          {/*  <Dropdown.Toggle disabled={true}>Отчёты</Dropdown.Toggle>*/}
          {/*  <Dropdown.Menu>*/}
          {/*    <Dropdown.Item>Сформировать отчёт по данным таблицы</Dropdown.Item>*/}
          {/*    <Dropdown.Item>Скачать</Dropdown.Item>*/}
          {/*    <Dropdown.Item>Показывать меню</Dropdown.Item>*/}
          {/*  </Dropdown.Menu>*/}
          {/*</Dropdown>*/}
          {/* <Button variant="outline-primary">Простая кнопка</Button> */}
        </ButtonGroup>
      </div>
    </div>
  );
}

export default Tools;