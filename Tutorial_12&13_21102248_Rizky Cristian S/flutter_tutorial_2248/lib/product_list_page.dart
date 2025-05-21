import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'Product.dart';

void main() => runApp(const ProductListPage());

class ProductListPage extends StatefulWidget {
  const ProductListPage({super.key});

  @override
  State<ProductListPage> createState() => _ProductListPageState();
}

Future<List<Product>> fetchProduct() async {
  final res = await http.get(Uri.parse('http://192.168.4.12:8000/api/product'));
  print('Response: ${res.body}'); // Debug print
  if (res.statusCode == 200) {
    var data = jsonDecode(res.body);
    var parsed = data['list'].cast<Map<String, dynamic>>();
    return parsed.map<Product>((json) => Product.fromJson(json)).toList();
  } else {
    throw Exception('Failed');
  }
}

class _ProductListPageState extends State<ProductListPage> {
  late Future<List<Product>> products;

  @override
  void initState() {
    super.initState();
    products = fetchProduct();
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Daftar Produk',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        scaffoldBackgroundColor: Colors.grey[100],
      ),
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Daftar Produk'),
          backgroundColor: Colors.blue[700],
        ),
        backgroundColor: Colors.white,
        body: SafeArea(
          child: FutureBuilder<List<Product>>(
            future: products,
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                if (snapshot.data!.isEmpty) {
                  return const Center(
                    child: Text(
                      'Tidak ada data',
                      style: TextStyle(color: Colors.teal, fontSize: 28),
                    ),
                  );
                }
                return ListView.builder(
                  itemCount: snapshot.data!.length,
                  itemBuilder: (context, index) {
                    return Card(
                      color: Colors.white,
                      child: InkWell(
                        child: Container(
                          padding: const EdgeInsets.only(left: 20, top: 15),
                          margin: const EdgeInsets.only(
                            bottom: 40,
                            left: 10,
                            top: 10,
                          ),
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                snapshot.data![index].name,
                                style: const TextStyle(
                                  color: Colors.blue,
                                  fontSize: 28,
                                ),
                              ),
                              Text(
                                'Rp ${snapshot.data![index].price.toString()}',
                                style: const TextStyle(
                                  color: Colors.green,
                                  fontSize: 24,
                                ),
                              ),
                            ],
                          ),
                        ),
                      ),
                    );
                  },
                );
              } else {
                return const Center(child: CircularProgressIndicator());
              }
            },
          ),
        ),
      ),
    );
  }
}
