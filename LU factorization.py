#First matrix
R=int(input("Enter number of first rows : "))
C=int(input("Enter number of first columns: "))
mat= [];
if(R != 0 and C != 0):
    print("Enter the entries rowwise:")      
    for i in range(R):          
        a =[] 
        for j in range(C):      
             a.append(int(input())) 
        mat.append(a) 
  
def luDecomposition(mat, n): 
  
    lower = [[0 for x in range(n)]  
                for y in range(n)]; 
    upper = [[0 for x in range(n)]  
                for y in range(n)]; 
                  
    # Decomposing matrix into Upper  
    # and Lower triangular matrix 
    for i in range(n): 
  
        # Upper Triangular 
        for k in range(i, n):  
  
            # Summation of L(i, j) * U(j, k) 
            sum = 0; 
            for j in range(i): 
                sum += (lower[i][j] * upper[j][k]); 
  
            # Evaluating U(i, k) 
            upper[i][k] = mat[i][k] - sum; 
  
        # Lower Triangular 
        for k in range(i, n): 
            if (i == k): 
                lower[i][i] = 1; # Diagonal as 1 
            else: 
                # Summation of L(k, j) * U(j, i) 
                sum = 0; 
                for j in range(i): 
                    sum += (lower[k][j] * upper[j][i]); 
                # Evaluating L(k, i) 
                lower[k][i] = float((mat[k][i] - sum) /
                                  upper[i][i]); 
  
    # setw is for displaying nicely 
    print("Lower Triangular\t\tUpper Triangular"); 
  
    # Displaying the result : 
    for i in range(n): 
          
        # Lower 
        for j in range(n): 
            print(lower[i][j], end = "\t");  
        print("", end = "\t"); 
  
        # Upper 
        for j in range(n): 
            print(upper[i][j], end = "\t"); 
        print(""); 
  
# Driver code 
  
luDecomposition(mat, int(R)); 
  
# This code is contributed by mits 
