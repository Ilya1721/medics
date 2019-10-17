import React from 'react'
import ReactDOM from 'react-dom'
import ClinicsCard from './ClinicsCard'

export default class ClinicsCardBoard extends React.Component {
  render() {
    return(
      <div>
        <ClinicsCard />
        <ClinicsCard />
        <ClinicsCard />
      </div>
    )
  }
}

if(document.getElementById('clinicsCardBoard')) {
  ReactDOM.render(<ClinicsCardBoard />, document.getElementById('clinicsCardBoard'))
}
