import React from 'react'

export default class DoctorCard extends React.Component {
  render() {
    return(
      <div>
        <div className="card mt-3">
          <div className="row font-weight-bold">
            <div className="col-2 text-left">
              <img src="/img/noImage.png" style={{width: '125px', height: '150px'}} />
            </div>
            <div className="col-8 text-left">
              <div className="card-body text-left">
                Азарянський Андрій Васильович
              </div>
            </div>
          </div>
          <div className="row my-3 font-weight-bold">
            <div className="col text-center">
              Сімейний лікар
            </div>
            <div className="col text-center">
              Амбулаторія загальної практики сімейної медицини №3
            </div>
            <div className="col text-center">
              Тривалість 10 хв.
            </div>
            <div className="col">
              <a className="btn btn-primary" role="button" href="#">
                <span className="mx-5">Записатися</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    )
  }
}
