import React from 'react'
import ReactDOM from 'react-dom'
import LeftControlPanel from './LeftControlPanel'
import LabBoard from './LabBoard'

export default class Home extends React.Component {
  render() {
    return(
      <div>
        <div className="row mx-4">
          <div className="col text-left">
            <LeftControlPanel fio="Вишинський Ілля Олександрович"/>
          </div>
          <div className="col-6">
            <h3>Останні показники</h3>
            <LabBoard/>
          </div>
          <div className="col">
            {/*Empty*/}
          </div>
        </div>
      </div>
    )
  }
}

if(document.getElementById('home')) {
  ReactDOM.render(<Home/>, document.getElementById('home'))
}
