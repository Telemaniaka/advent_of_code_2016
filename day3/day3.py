with open('day3_input.txt') as f:
    triangles = f.readlines()


t = 0
for triangle in triangles:
    triangle = triangle.strip().split();
    triangle[0] = int(triangle[0])
    triangle[1] = int(triangle[1])
    triangle[2] = int(triangle[2])
    triangles[t] = triangle
    t = t + 1

t = 0
for triangle in triangles:
    if triangle[0] + triangle[1] <= triangle[2]:
        continue
    if triangle[1] + triangle[2] <= triangle[0]:
        continue
    if triangle[2] + triangle[0] <= triangle[1]:
        continue
    t = t + 1

print "Part 1:",t

t = 0
for i in range(0,len(triangles),3):
    if (triangles[i][0] + triangles[i+1][0] > triangles[i+2][0]) and (triangles[i+1][0] + triangles[i+2][0] > triangles[i][0]) and (triangles[i+2][0] + triangles[i][0] > triangles[i+1][0]):
        t=t+1

    if (triangles[i][1] + triangles[i+1][1] > triangles[i+2][1]) and (triangles[i+1][1] + triangles[i+2][1] > triangles[i][1]) and (triangles[i+2][1] + triangles[i][1] > triangles[i+1][1]):
        t=t+1

    if (triangles[i][2] + triangles[i+1][2] > triangles[i+2][2]) and (triangles[i+1][2] + triangles[i+2][2] > triangles[i][2]) and (triangles[i+2][2] + triangles[i][2] > triangles[i+1][2]):
        t=t+1

print "Part 2:",t
