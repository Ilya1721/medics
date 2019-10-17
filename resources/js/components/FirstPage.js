import React from 'react'
import ReactDOM from 'react-dom'

class FirstPage extends React.Component {
  render() {
    return(
      <main>
        <div className="container mt-3">
          <h1 className="text-center">Зручна система для обліку пацієнтів</h1>
          <div className="row mt-4">
            <div className="col-md-12 text-center">
              <div className="dropdown btn-group">
                <button className="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Знайти лікаря
                  <span className="caret"></span>
                </button>
                <ul className="dropdown-menu">
                  <li><a className="nav-link dropdown-item" href="#">Терапевт</a></li>
                  <li><a className="nav-link dropdown-item" href="#">Стоматолог</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div className="row mt-5">
            <div className="col">
              <h3>2735 лікарів</h3>
              <p className="mt-4">Доступ до інформації про більш ніж 2700 лікарів</p>
            </div>
            <div className="col">
              <h3>10375 ВІДГУКІВ</h3>
              <p className="mt-4">Допоможуть вам обрати найкращого спеціаліста</p>
            </div>
            <div className="col">
              <h3>ПРИЙОМ БЕЗ ЧЕРГ</h3>
              <p>Оберіть зручний час для прийому</p>
            </div>
            <div className="col">
              <h3>SMS-НАГАДУВАННЯ</h3>
              <p>Вчасно нагадаємо вам про візит</p>
            </div>
          </div>
          <div className="row mt-5">
            <div className="col md-12 text-center">
              <h3>Сподобалась Система?</h3>
              <p>Економте свій час</p>
              <a className="btn btn-primary" href="#" role="button">Створити обліковий запис</a>
            </div>
          </div>
        </div>
      </main>
    )
  }
}

if(document.getElementById('firstPage')) {
  ReactDOM.render(<FirstPage />, document.getElementById('firstPage'))
}
