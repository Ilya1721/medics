import React from 'react'

export default class LeftControlPanel extends React.Component {
  render() {
    return(
      <div>
        <div className="my-3">
          <img src="/img/noImage.png" style={{width: "250px", height: "300px"}} />
        </div>
        <h4>{this.props.fio}</h4>
        <p>Medics ID: 1462402</p>
        <div className="btn-group-vertical" role="group">
          <a className="btn btn-outline-primary btn-lg" role="button" href="#"><span className="mx-5">Пацієнти</span></a>
          <a className="btn btn-outline-primary btn-lg" role="button" href="#"><span className="mx-5">Хвороби</span></a>
          <a className="btn btn-outline-primary btn-lg" role="button" href="#"><span className="mx-5">Назначити лікування</span></a>
          <a className="btn btn-outline-primary btn-lg" role="button" href="#"><span className="mx-5">Назначити процедури</span></a>
        </div>
      </div>
    )
  }
}
