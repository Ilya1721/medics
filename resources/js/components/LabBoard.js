import React from 'react'
import LabsCard from './LabsCard'

export default class LabBoard extends React.Component {
  render() {
    return(
      <div>
        <div className="row mt-2">
          <div className="col">
            <LabsCard title="Вага" description="-- кг" />
          </div>
          <div className="col">
            <LabsCard title="Кров’яний тиск" description="---/-- мм.рт.ст" />
          </div>
          <div className="col">
            <LabsCard title="Пульс" description="-- уд/хв" />
          </div>
        </div>
        <div className="row mt-2">
          <div className="col">
            <LabsCard title="Цукор у крові" description="-.- ммоль/л" />
          </div>
          <div className="col">
            <LabsCard title="Температура тіла" description="--.- °C" />
          </div>
          <div className="col">
            <LabsCard title="Зріст" description="--- см" />
          </div>
        </div>
      </div>
    )
  }
}
