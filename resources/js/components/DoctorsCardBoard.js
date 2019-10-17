import React from 'react'
import ReactDOM from 'react-dom'
import DoctorCard from './DoctorCard'

export default class DoctorsPage extends React.Component {
  render() {
    return(
      <div>
        <h2 className="text-center mt-3">Лікарі</h2>
        <DoctorCard />
        <DoctorCard />
        <DoctorCard />
        <DoctorCard />
        <DoctorCard />
        <DoctorCard />
      </div>
    )
  }
}

if(document.getElementById('doctorsCardBoard')) {
  ReactDOM.render(<DoctorsPage />, document.getElementById('doctorsCardBoard'))
}
