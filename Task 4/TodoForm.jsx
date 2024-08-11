import { ListItem } from "@mui/material";
import { TextField } from "@mui/material";
import { useState } from "react";
import { Create } from "@mui/icons-material";
import { InputAdornment } from "@mui/material";

import { IconButton } from "@mui/material";
export default function TodoForm({ addTodo }) {
  const [text, setText] = useState("");
  const handelChange = (evt) => {
    setText(evt.target.value);
  };
  const handleSubmit = (evt) => {
    evt.preventDefault();
    addTodo(text);
    setText("");
  };
  return (
    <ListItem>
      <form onSubmit={handleSubmit}>
        <TextField
          id="standard-basic"
          label="Add Todo"
          variant="standard"
          onChange={handelChange}
          value={text}
          InputProps={{
            endAdornment: (
              <InputAdornment position="end">
                <IconButton aria-label=" Create to-do" edge="end" type="submit">
                  <Create />
                </IconButton>
              </InputAdornment>
            ),
          }}
        />
      </form>
    </ListItem>
  );
}

{
  /* <FormControl sx={{ m: 1, width: "25ch" }} variant="outlined">
  <InputLabel htmlFor="outlined-adornment-password">Password</InputLabel>
  <OutlinedInput
    id="outlined-adornment-password"
    type={showPassword ? "text" : "password"}
    label="Password"
  />
</FormControl>; */
}
