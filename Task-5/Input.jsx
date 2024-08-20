// import Wrapper from "./Wrapper";
import "./Input.css";
import { useState } from "react";

export default function Input() {
  const [value, setValue] = useState("");
  const handleClick = (e) => {
    setValue(value + e.target.value);
  };
  const handleClear = () => {
    setValue("");
  };
  const handelDelete = () => {
    setValue(value.slice(0, -1));
  };
  const handleEqual = () => {
    setValue(eval(value));
  };
  // const  btnValues.map((e) => {
  //   return (
  //     <div>
  //       <input type="button" value={e.btnValues} onClick={e.handleClick} />
  //     </div>
  //   );
  // });
  return (
    <div>
      {/* <Wrapper /> */}
      <h1>Welcome to the calculator</h1>
      <div className="container">
        <div className="calculator">
          <form action="">
            <div className="display">
              <input type="text" value={value} defaultValue={0} />
            </div>
            <div>
              <input type="button" value="AC" onClick={handleClear} />
              <input type="button" value="DE" onClick={handelDelete} />
              <input type="button" value="." onClick={handleClick} />
              <input type="button" value="/" onClick={handleClick} />
            </div>
            <div>
              <input type="button" value="7" onClick={handleClick} />
              <input type="button" value="8" onClick={handleClick} />
              <input type="button" value="9" onClick={handleClick} />
              <input type="button" value="*" onClick={handleClick} />
            </div>
            <div>
              <input type="button" value="4" onClick={handleClick} />
              <input type="button" value="5" onClick={handleClick} />
              <input type="button" value="6" onClick={handleClick} />
              <input type="button" value="+" onClick={handleClick} />
            </div>
            <div>
              <input type="button" value="1" onClick={handleClick} />
              <input type="button" value="2" onClick={handleClick} />
              <input type="button" value="3" onClick={handleClick} />
              <input type="button" value="-" onClick={handleClick} />
            </div>
            <div>
              <input type="button" value="00" onClick={handleClick} />
              <input type="button" value="0" onClick={handleClick} />
              <input
                type="button"
                value="="
                className="equal"
                onClick={handleEqual}
              />
            </div>
          </form>
        </div>
      </div>
    </div>
  );
}
