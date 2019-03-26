import * as React from 'react';

export class Panel extends React.Component {
  render() {
    return <div className="w-4/5 container--medium mx-auto mt-16 bg-white shadow-lg py-8 px-12 rounded-sm">{this.props.children}</div>;
  }
}
