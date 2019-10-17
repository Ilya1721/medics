import React from 'react'
import ClinicsAddressTime from './ClinicsAddressTime'

export default class ClinicsCard extends React.Component {
  render() {
    return(
      <div>
        <div className="card mt-3">
          <div className="row mt-2">
            <div className="col-2">
              <img src="/img/noImage.png" style={{width: '125px', height: '150px'}} />
            </div>
            <div className="col-6">
              <h4>КОМУНАЛЬНЕ ПІДПРИЄМСТВО "ХМЕЛЬНИЦЬКИЙ МІСЬКИЙ ПЕРИНАТАЛЬНИЙ ЦЕНТР"
                  ХМЕЛЬНИЦЬКОЇ МІСЬКОЇ РАДИ
              </h4>
              <p>Перинатальний центр</p>
            </div>
            <div className="col-2">
              <p>Хотовицького, 6, Хмельницький</p>
              <p>(0382) 22-37-39</p>
            </div>
          </div>
          <div className="row">
            <div className="col-2">

            </div>
            <div className="col-8">
              <p className="font-weight-bold">Амбулаторії</p>
              <hr/>
              <ClinicsAddressTime />
              <hr/>
              <ClinicsAddressTime />
              <hr/>
              <ClinicsAddressTime />
            </div>
          </div>
        </div>
      </div>
    )
  }
}
