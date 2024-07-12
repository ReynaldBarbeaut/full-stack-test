import * as React from 'react';
import {useEffect, useState} from "react";
import logo from '../../images/logo.png'

export const App: React.FC = () => {
    const [years, setYears] = useState([]);
    const [vehicleModels, setVehicleModels] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            let response = await fetch('http://127.0.0.1:8080/api/vehicle-years/1');
            let years = await response.json();
            setYears(years);

            response = await fetch('http://127.0.0.1:8080/api/vehicle-models/1');
            let vehicleModels = await response.json();
            setVehicleModels(vehicleModels);
        };

        fetchData();
    }, []);

    return (
        <table>
            <thead>
                <tr>
                    <th><img src={logo} alt={"logo"}/></th>
                    {years.map((year) => (<th key={year}>{year}</th>))}
                </tr>
            </thead>
            <tbody>
                {vehicleModels.map((vehicleModel, index) => (
                    <tr key={index}>
                        <th key={vehicleModels[index].id}>{vehicleModels[index].name}</th>
                        <td></td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
}