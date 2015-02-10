# Casa musical
---
## Crear un nuevo producto
Solicitud [POST] /newProduct

    {
        product: "Pandero",
        model: "mandero3",
        key: "DFT5",
        price: 23,
        gain: 3,
        price_iva: 26,
        reserve: 23,
        reorderpoint: 3,
        provider_id: 10
    }

respuesta

    Success
    {
        msg: "Correcto"
    }
    Error
    
    {
        errors: {}
    }
    
## Eliminar un producto
solicitud [DELETE] /deleteProduct/:id

respuesta
    
    Success
    {
        mgs: "Correcto"
    }
    Error
    {
        mgs: "Error"
    }
## Obtener un producto
solicitud [GET] /editProduct/:id

respuesta 

    Success
    {
        id: 123,
        product: "Pandero",
        model: "mandero3",
        key: "DFT5",
        price: 23,
        gain: 3,
        price_iva: 26,
        reserve: 23,
        reorderpoint: 3,
        status: "r",
        provider_id: 10
    }
    Error
    {
        mgs: "Error"
    }
    
## Obtener todos los productos
solicitud [GET] /products

respuesta 
    
    Success
    [
        {
            id:123,
            product: "pandero"
        },
        {
            id: 1234,
            product: "Guitarra"
        }
    ]
    Error
    {
        msg: "Error"
    }

##Actualizar producto
Solicitud [PUT] /updateProduct

    {
        id: 123,
        product: "Pandero Blanco",
        model: "mandero3",
        key: "DFT5",
        price: 23,
        gain: 3,
        price_iva: 26,
        reserve: 23,
        reorderpoint: 3,
        provider_id: 11
    }
    
Respuesta
    
    Success
    {
        mgs: "Correcto"
    }
    Error
    {
        errors: {}
    }
---
## Crear una venta
Solicutud [POST] /newSale

    {
        id: "2", 
        quantity: 1, 
        date: 1423528816115
    }
    
Respuesta

    Success
    {
        mgs: "Correcto"
    }
    Error
    {
        mgs: "Error"
    }

## Obtener todas la ventas
Solicitud [GET] /sales

Respuesta

    Success
    [
        {
            created_at: "2015-02-09 18:40:16",
            date: "1423528816115",
            id: "52",
            model: "Asha Konopelski",
            price: "1693.00",
            product: "Jazmin Dibbert",
            product_id: "2",
            quantity: "1",
            total: "944.00",
            updated_at: "2015-02-09 18:40:16"
        },
        {
            created_at: "2015-02-09 18:40:16",
            date: "1423528816115",
            id: "52",
            model: "Asha Konopelski",
            price: "1693.00",
            product: "Jazmin Dibbert",
            product_id: "2",
            quantity: "1",
            total: "944.00",
            updated_at: "2015-02-09 18:40:16"
        }
    ]       
    Error
    {
        msg: "Error"
    }

---
## Crear un nuevo proveedor
Solicitud [POST] /newProvider
    {
        name: "Cristian",
        home: "Mi casa",
        phone: "61 545 07",
        delivery_time: 10,
        description: "ESto es una descripcion"
    }
Respuesta

    Success
    {
        msg: "Correcto"
    }
    Error
    {
        errors: {}
    }
    
## Optener un proveedor
Solicitud [GET] /editProvider/:id

Respuesta
    Success
    {
        id: 12
        name: "Cristian",
        home: "Mi casa",
        phone: "61 545 07",
        delivery_time: 10,
        description: "ESto es una descripcion"
    }
    Error
    {
        msg: "Error"
    }

## Obtener a todos los proveedores
Solicitud [GET] /providers

Respuesta
    Success
    [
        {
            id: 12
            name: "Cristian",
            home: "Mi casa",
            phone: "61 545 07",
            delivery_time: 10,
            description: "ESto es una descripcion"
        },
        {
            id: 122
            name: "Cristian",
            home: "Mi casa",
            phone: "61 545 07",
            delivery_time: 10,
            description: "ESto es una descripcion"
        }
    ]
    Error
    {
        msg: "Error"
    }

## Actualizar un proveedor
Solicitud [PUT] /updateProvider

    {
        id: 12
        name: "Cristian",
        home: "Mi casa",
        phone: "61 545 07",
        delivery_time: 10,
        description: "ESto es una descripcion"
    }
    
Respuesta
    Success
    {
        msg: "Corecto"
    }
    Error
    {
        errors: {}
    }

## Eliminar un proveedor
Solicitud [DELETE] /deleteProvider/:id