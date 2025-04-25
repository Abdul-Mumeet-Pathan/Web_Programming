import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
   let [count, setCount] = useState(15)

  // let counter=5;
const addValue=() => {
  console.log("value added",count);
  count=count+1;
  setCount(count);
}

const removeVal = () => {
  if (count > 0) {
    console.log("value removed", count);
    setCount(count - 1);
  } else {
    console.log("Can't go below zero!");
  }
}
  return (
    <>
      <h1>Chai</h1>
      <h2>Counte Value: {count}</h2>

      <button
        onClick={addValue}>Add Value</button>
      <br/>
      <button onClick={removeVal}>Remove Value</button>

    </>
  )
}

export default App
