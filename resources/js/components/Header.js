import React from 'react'
import ReactDOM from 'react-dom'

export default class Header extends React.Component {
  render() {
    return(
      <div>
        <nav className="navbar navbar-light bg-light navbar-expand-lg">
          <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav mr-auto">
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
