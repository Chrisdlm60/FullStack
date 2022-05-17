import React,{useState,useEffect} from 'react';
import './App.css';
import MovieBox from './MovieBox';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Navbar,Container,Nav,Form, FormControl,Button } from 'react-bootstrap';

const API_URL="https://api.themoviedb.org/3/movie/popular?api_key=f33cd318f5135dba306176c13104506a";
const API_SEARCH="https://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query";

function App() {

  const [movies, setMovies]=useState([]);
  const [query, setQuery]=useState('');

  // Récupération des données de l'API moviedb
  useEffect(() => {
    fetch(API_URL)
    .then((res)=>res.json())
    .then(data=>{
      console.log(data);
      setMovies(data.results);
    })
  }, [])

  // Fonction (asynchrone) de recherche 
  const searchMovie = async(e)=>{
    e.preventDefault();
    console.log("Searching");
    try{
      const url=`${API_SEARCH}=${query}`;
      const res= await fetch(url);
      const data= await res.json();
      console.log(data);
      setMovies(data.results);
    }
    catch(e){
      console.log(e);
    }
  }

  // Récupération de la valeur de saisie
  const handleChangeSearch=(e)=>{
    setQuery(e.target.value);
  }

  return (
    <>
    {/* Composant Navbar */}
    <Navbar bg="dark" expand="lg" variant="dark">
      <Container fluid>
        <Navbar.Brand href="/home">MovieDb App</Navbar.Brand>
        <Navbar.Toggle aria-controls="navbarScroll"></Navbar.Toggle>

          <Navbar.Collapse id="nabarScroll">
            <Nav 
            className="me-auto my-2 my-lg-3"
            style={{maxHeight:'100px'}}
            navbarScroll></Nav>

            {/* Composant Form pour la recharche */}
            <Form className="d-flex" onSubmit={searchMovie} autoComplete="off">
              <FormControl
                type="search"
                placeholder="Movie Search"
                className="me-2"
                aria-label="search"
                name="query"
                value={query} onChange={handleChangeSearch}>    
              </FormControl>
              <Button variant="secondary" type="submit">Search</Button>
            </Form>
            
          </Navbar.Collapse>
      </Container>
    </Navbar>
    <div>
      {/* Si résultat => afficher avec map((obj) => <balise key="obj.id">obj.content) */}
      {movies.length > 0 ?(
        <div className="container">
          <div className="grid">
            {movies.map((movies)=>
             <MovieBox key={movies.id} {...movies}/>)} {/* {...props} Opérateur de décomposition pour passer l'intégralité du props movies */}
          </div>
        </div>
      ):(
        <h2>Sorry !! No Movies Found</h2>
      )}
    </div>   
    </>
   
  );
}

export default App;