import React from 'react'
import ReactDOM from 'react-dom'

export default class Header extends React.Component {
  render() {
    return(
      <div>
        <nav className="navbar navbar-light bg-light navbar-expand-lg">
          <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav mr-auto">
              <li className="nav-item dropdown">
                <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Оберіть своє місто
                </a>
                <div className="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a className="dropdown-item" href="#">Хмельницький</a>
                  <a className="dropdown-item" href="#">Житомир</a>
                  <a className="dropdown-item" href="#">Вінниця</a>
                  <a className="dropdown-item" href="#">Тернопіль</a>
                </div>
              </li>
              <li className="nav-item active">
                <a className="nav-link text-secondary" href="/doctors">Лікарі <span className="sr-only">(current)</span></a>
              </li>
              <li className="nav-item active">
                <a className="nav-link text-secondary" href="/clinics">Клініки <span className="sr-only">(current)</span></a>
              </li>
              <li className="nav-item active">
                <a className="nav-link text-secondary" href="/welcome">Головна сторінка <span className="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    )
  }
}

if(document.getElementById('header')) {
  ReactDOM.render(<Header/>, document.getElementById('header'))
}
