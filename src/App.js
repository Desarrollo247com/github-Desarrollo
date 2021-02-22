import React, { Component } from "react";
import Buscador from './componentes/Buscador'

class App extends Component{

    state ={
      termino : ''
    };

    consultarApi = () =>{
      const url = `http://247.com.ec/toyotago/admin/webservices/destinos.php?id=${this.state.termino}`;
      //console.log(url);
        fetch(url,{
            'mode': 'cors',
                'headers': {
                'Access-Control-Allow-Origin': '*',
            }
        })
            .then(respuesta => respuesta.json())
            .then(resultado => console.log(resultado))
    };

    datosBusqueda = (termino) =>{
        console.log(termino);
        this.setState({
            termino
        }, () =>{
            this.consultarApi();
        });
    };
    render() {
        return (
            <div className="app container">
                <div className="jumbotron">
                    <p className="lead text-center"> Buscador de sitios</p>
                    <Buscador
                        datosBusqueda={this.datosBusqueda}/>
                </div>
                {this.state.termino}
            </div>
        );
    }

}

export default App;
