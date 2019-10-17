import React from 'react'

export default class LabsCard extends React.Component {
  render() {
    return(
      <div>
        <div className="card">
          <div className="card-body">
            <h5 className="card-title">{this.props.title}</h5>
            <p className="card-text">{this.props.description}</p>
          </div>
        </div>
      </div>
    )
  }
}
