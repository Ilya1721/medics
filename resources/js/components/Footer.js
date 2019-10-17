import React from 'react'
import ReactDOM from 'react-dom'

export default class Footer extends React.Component {
  render() {
    return(
      <nav className="navbar mt-5 sticky-bottom navbar-expand-sm navbar-dark bg-dark">
          <a className="navbar-brand" href="#">KN-17-2</a>
        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse" id="navbarCollapse">
          <ul className="navbar-nav mr-auto">
            <li className="text-white m-auto">
              © Copyright 2019
            </li>
            <li className="text-white m-auto pl-2">
              Вишинський І.О.
            </li>
          </ul>
        </div>
      </nav>
    )
  }
}

if(document.getElementById('footer')) {
  ReactDOM.render(<Footer/>, document.getElementById('footer'))
}
