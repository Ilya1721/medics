import React from 'react'

export default class ClinicsAddressTime extends React.Component {
  render() {
    return (
      <div>
        <p>Філіал в Поліклініці №1</p>
        <div className="text-right">
          Пн - Пт: <span className="font-weight-bold">08:00 - 19:00</span>
        </div>
        <p className="text-secondary">вулиця Подільська, 54, Хмельницький</p>
      </div>
    )
  }
}
